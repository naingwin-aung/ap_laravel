<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->get();
        return view('home', compact('posts'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $data = new Post();
        $data->name = $request->name;
        $data->description = $request->description;
        $data->save();

        return redirect('/posts');
    }

    public function show(Post $post)
    {
       return(view('show', compact('post')));
    }

    public function edit(Post $post)
    {
        return (view('edit', compact('post')));
    }

    public function update(Request $request, Post $post)
    {
        $post->name = $request->name;
        $post->description = $request->description;
        $post->save();

        return redirect('/posts');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/posts');
    }
}
