<?php

namespace App\Http\Controllers;

use App\Interfaces\ArticleRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ResearchArticleController extends Controller
{
    protected ArticleRepositoryInterface $articleRepository;

    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    /**
     * Get all articles
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(
            [
                'data' => $this->articleRepository->getAllArticles()
            ]
        );
    }

    /**
     * Get article by id
     * @param int $id
     * @return JsonResponse
     */
    public function show(Request $request): JsonResponse
    {
        $articleId = $request->route('id');
        return response()->json(
            [
                'data' => $this->articleRepository->getSingleArticle($articleId)
            ]
        );
    }

    /**
     * Create new article
     * @param Request $request
     * @return JsonResponse
     */
    //TODO article fields
    public function store(Request $request): JsonResponse
    {
        $articleDetails = $request->only(
            [
                'user_id',
                'articletitle',
                'summary',
                'fullarticle',
                'source',
                'featuredimage',
                'articleimages'
            ]
        );

        //for multiple images
        $imagefiles = [];
        if ($request->hasFile('articleimages')) {
            foreach ($request->file('articleimages') as $image) {
                $name = time().rand(1, 100).'.'.$image->extension();
                $image->move(public_path('uploads'), $name);
                $imagefiles[] = $name;
            }
        }

        $articleDetails['articleimages'] = $imagefiles;

        return response()->json(
            [
                'data' => $this->articleRepository->addArticle($articleDetails)
            ]
        );
    }

    /**
     * Update article
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    //TODO article fields
    public function update(Request $request): JsonResponse
    {
        $articleId = $request->route('id');

        $articleDetails = $request->only([
            'user_id',
            'articletitle',
            'summary',
            'fullarticle',
            'source',
            'featuredimage',
            'articleimages'
         ]);
        //for multiple images
        $imagefiles = [];
        if ($request->hasFile('articleimages')) {
            foreach ($request->file('articleimages') as $image) {
                $name = time().rand(1, 100).'.'.$image->extension();
                $image->move(public_path('uploads'), $name);
                $imagefiles[] = $name;
            }
        }

        $articleDetails['articleimages'] = $imagefiles;

        return response()->json(
            [
                'data' => $this->articleRepository->updateArticle($articleId, $articleDetails)
            ]
        );
    }

    /**
     * Delete article
     * @param int $id
     * @return void
     */
    public function delete(Request $request): JsonResponse
    {
        $articleId = $request->route('id');
        $this->articleRepository->deleteArticle($articleId);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
