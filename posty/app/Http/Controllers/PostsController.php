<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    public function index(Post $post)
    {

        $posts = Post::orderBy("created_at", "desc")->with(["user", "likes"])->paginate(2);
        return view("posts.index", [
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

    public function destroy(Post $post)
    {
        // if ($post->ownedBy(auth()->user())) {
        //     dd("You are not allowed to delete");
        // }
        $this->authorize("delete", $post);
        $post->delete();

        return back();
    }
}
