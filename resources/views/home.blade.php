@extends('layout')

@section('content')
   <div class="container">
    <a href="{{url("/posts/create")}}" class="btn btn-success mb-3">New Post</a>
       @foreach ($posts as $post)
            <div class="card mb-3 shadow border-0">
                <div class="card-header h4 bg-dark text-white">
                    {{$post->name}}
                </div>
                    <div class="card-body">
                        <p class="card-text">{{ $post->description }}</p>
                        <a href="{{url("/posts/$post->id")}}" class="btn btn-primary">View</a>
                        <a href="{{url("/posts/$post->id/edit")}}" class="btn btn-info">Edit</a>
                        <form action="{{url("/posts/$post->id")}}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post')">Delete</button>
                        </form>
                    </div>
            </div>
        @endforeach
   </div>
@endsection