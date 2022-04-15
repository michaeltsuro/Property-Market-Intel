<?php

namespace App\Http\Controllers;

use App\Interfaces\PapersRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ResearchPaperController extends Controller
{
    protected PapersRepositoryInterface $researchPaperRepository;

    public function __construct(PapersRepositoryInterface $researchPaperRepository)
    {
        $this->researchPaperRepository = $researchPaperRepository;
    }

    /**
     * Get all papers
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(
            [
                'data' => $this->researchPaperRepository->getResearchPapers()
            ]
        );
    }

    /**
     * Get single paper
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function show(Request $request): JsonResponse
    {
        $paperId = $request->route('id');
        return response()->json(
            [
                'data' => $this->researchPaperRepository->getSingleResearchPaper($paperId)
            ]
        );
    }

    /**
     * Create new paper
     * @param Request $request
     * @return JsonResponse
     */
    //TODO research paper fields
    public function store(Request $request): JsonResponse
    {
        $paperDetails = $request->only(
            [
                'user_id',
                'researchtitle',
                'summary',
                'source',
                'featuredimage',
                'researchfile'
            ]
        );
        return response()->json(
            [
                'data' => $this->researchPaperRepository->addResearchPaper($paperDetails)
            ]
        );
    }

    /**
     * Update paper
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request): JsonResponse
    {
        $paperId = $request->route('id');
        $paperDetails = $request->only(
            [
                'user_id',
                'researchtitle',
                'summary',
                'source',
                'featuredimage',
                'researchfile'
            ]
        );
        return response()->json(
            [
                'data' => $this->researchPaperRepository->updateResearchPaper($paperId, $paperDetails)
            ]
        );
    }

    /**
     * Delete research paper
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(Request $request): JsonResponse
    {
        $paperId  = $request()->route('id');
        $this->researchPaperRepository->deleteResearchPaper($paperId);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
