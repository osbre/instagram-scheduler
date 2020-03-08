<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->paginate()
        ]);
    }

    public function create()
    {
        return view('posts.edit');
    }

    public function store(Request $request)
    {
        $post = (new Post)->fill($request->all());
        $post->save();
        $post->addMediaFromRequest('photo')->toMediaCollection();

        return redirect()->route('home');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }
}
