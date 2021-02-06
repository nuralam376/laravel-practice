<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
    public function allArticles()
    {
        return Article::all();
    }

    public function getArticle(Article $article)
    {
        // return Article::findOrFail($id);
        return $article;
    }
}
