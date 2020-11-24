@extends('layout')

@section('content')
   <div class="container">
    <a href="{{url("/posts/create")}}" class="btn btn-success mb-3">New Post</a>
       @foreach ($posts as $post)
            <div class="card mb-3">
                <div class="card-header h4 bg-dark text-white">
                    {{$post->name}}
                </div>
                    <div class="card-body">
                        <p class="card-text">{{ $post->description }}</p>
                        <a href="#" class="btn btn-primary">View</a>
                    </div>
            </div>
        @endforeach
   </div>
@endsection