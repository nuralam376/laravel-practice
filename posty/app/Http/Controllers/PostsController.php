<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    public function index()
    {
        $posts = Post::get();
        return view("posts.index",[
            "posts" => $posts
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "body" => "required"
        ]);

        // Post::create([
        //     "body" => $request->body,
        //     "user_id" => auth()->id()
        // ]);

        // auth()->user()->posts->create($request->only("body"));

        $request->user()->posts()->create($request->only("body"));


        return back();

    }
}
