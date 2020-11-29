@extends('layout')

@section('content')
   <div class="container">
       <div class="d-flex justify-content-between">
           <a href="{{url("/posts/create")}}" class="btn btn-success mb-3">New Post</a>
           <a href="{{url('logout')}}" class="btn btn-danger mb-3">Logout</a>
       </div>

       @foreach ($posts as $post)
            <div class="card mb-4 shadow border-0">
                <div class="card-header h4 bg-dark text-white">
                    {{$post->name}}
                    <p class="text-muted small">Category ::{{ $post->category->name}}</p>
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