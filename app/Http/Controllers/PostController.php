<?php

namespace App\Http\Controllers;

use App\Test;
use App\Models\Post;
use App\Mail\PostStored;
use App\Models\Category;
use App\Mail\PostCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\EditPostRequest;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
        $post = Post::create($validated + ['user_id'=>auth()->user()->id]);

        return redirect('/posts')->with('status', config('ap.message.created'));
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
