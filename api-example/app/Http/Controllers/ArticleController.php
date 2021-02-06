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

    public function createArticle(Request $request)
    {
        $title = $request->title;
        $content = $request->content;
        $user = $request->user();

        $article = new Article();
        $article->title = $title;
        $article->content = $content;
        $article->user_id = $user->id;
        $article->save();
        return $article;
    }


    public function updateArticle(Request $request, Article $article)
    {
        $user = $request->user();

        if ($user->id !== $article->user_id) {
            return response()->json(["error" => "You don't have permission to edit this product"], 404);
        } else {
            $article->title = $request->title;
            $article->content = $request->content;
            $article->save();
            return $article;
        }
    }

    public function deleteArticle(Request $request, Article $article)
    {
        $user = $request->user();

        if ($user->id !== $article->user_id) {
            return response()->json(["error" => "You don't have permission to edit this product"], 404);
        }

        $article->delete();
        return response()->json(["success" => "Article deletion completed"], 200);
    }
}
