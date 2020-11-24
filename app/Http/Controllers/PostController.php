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

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
