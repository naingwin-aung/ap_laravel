<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\EditPostRequest;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    
    public function index()
    {
        $posts = Post::where('user_id', auth()->id())->orderBy('id', 'DESC')->get();
        return view('home', compact('posts'));
    }

    public function create()
    {
        $category = Category::all();
        return view('create', compact('category'));
    }

    public function store(StorePostRequest $request)
    {
        
        // $data = new Post();
        // $data->name = $request->name;
        // $data->description = $request->description;
        // $data->save();
        
        // Post::create($request->all());
        
        $validated = $request->validated();
        Post::create($validated);

        return redirect('/posts');
    }

    public function show(Post $post)
    {
        // if($post->user_id != auth()->id()) {
        //     abort(403);
        // }

       $this->authorize('view', $post);
       return(view('show', compact('post')));
    }

    public function edit(Post $post)
    {
        // if($post->user_id != auth()->id()) {
        //     abort(403);
        // }
        
        $this->authorize('view', $post);
        $categories = Category::all();
        return (view('edit', compact('post', 'categories')));
    }

    public function update(EditPostRequest $request, Post $post)
    {
        
        // $post->name = $request->name;
        // $post->description = $request->description;
        // $post->save();
        
        $validated = $request->validated();
        $post->update($validated);

        return redirect('/posts');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/posts');
    }
}
