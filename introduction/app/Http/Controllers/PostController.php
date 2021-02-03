<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function createPost()
    {
        $post = new Post();
        $post->title = "Quick Brown Fox";
        $post->content = "Lorem Ipsum Dolor";
        $post->save();
        return $post;
    }
}
