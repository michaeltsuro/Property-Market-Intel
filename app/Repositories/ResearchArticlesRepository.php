<?php

namespace App\Repositories;

use App\Interfaces\ArticleRepositoryInterface;
use App\Models\ResearchArticles;

class ResearchArticlesRepository implements ArticleRepositoryInterface
{
    /**
     * Add a new article
     *
     * @param array $articleDetails
     * @return collection
     */
    public function addArticle(array $articleDetails)
    {
        return ResearchArticles::create($articleDetails);
    }

    /**
     * Update an article
     *
     * @param int $articleId
     * @param array $newDetails
     * @return collection
     */
    public function updateArticle($articleId, array $newDetails)
    {
        return ResearchArticles::whereId($articleId)->update($newDetails);
    }

    /**
     * Get all the articles
     *
     * @return collection
     */
    public function getAllArticles()
    {
        return ResearchArticles::all();
    }

    /**
     * Get a single article
     *
     * @param int $articleId
     * @return array
     */
    public function getSingleArticle($articleId)
    {
        return ResearchArticles::with('researcharticleimages')->findOrFail($articleId);
    }

    /**
     * Delete an article
     *
     * @param int $articleId
     * @return void
     */
    public function deleteArticle($articleId)
    {
        ResearchArticles::destroy($articleId);
    }
}
