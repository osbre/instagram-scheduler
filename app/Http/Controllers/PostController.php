<?php

namespace App\Http\Controllers;

use App\Enums\PostStatusEnum;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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

    public function store(StorePostRequest $request)
    {
        $post = (new Post)->fill(
            $request->merge(['status' => PostStatusEnum::IN_PROGRESS])->all()
        );
        $post->save();
        $post->addMediaFromRequest('photo')->toMediaCollection();

        return redirect()->route('home');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
            'is_published' => $post->status === PostStatusEnum::PUBLISHED
        ]);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        if ($request->hasFile('photo')) {
            $post->getFirstMedia()->delete();
            $post->addMediaFromRequest('photo')->toMediaCollection();
        }
        $post->update($request->all());
        return redirect()->back();
    }

    public function destroy(Post $post)
    {
        $post->getFirstMedia()->delete();
        $post->delete();
        return redirect()->back();
    }
}
