<?php

namespace App\Interfaces;

interface ArticleRepositoryInterface
{
    //the required methods
    public function addArticle(array $articleDetails);
    public function updateArticle($articleId, array $newDetails);
    public function deleteArticle($articleId);
    public function getSingleArticle($articleId);
    public function getAllArticles();
}
