@extends('layout')

@section('content')
    <div class="container">
        @if (session('status'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
       <div class="d-flex justify-content-between">
           <a href="{{url("/posts/create")}}" class="btn btn-success mb-3">New Post</a>
           <a href="{{url('logout')}}" class="btn btn-danger mb-3">Logout</a>
       </div>

       <h5 class="my-3 font-weight-bold text-danger">
           User Name - {{ Auth::user()->name }}
       </h5>
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