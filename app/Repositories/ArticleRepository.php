<?php
namespace App\Repositories;

use App\Models\Article\Article;

class ArticleRepository{

    public function getArticleForHome(){

        $article = Article::where('article_status',true)
        ->with('linkImage')
        ->orderBy('created_at')->take(3)->get();

        return $article;
    }
}