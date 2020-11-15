@extends('layout')

@section('content')
   <div class="container">
        <div class="card">
            <div class="card-header text-center">
                Content
            </div>
            @foreach ($posts as $post)
                <div class="card-body">
                    <h5 class="card-title">{{ $post->name }}</h5>
                    <p class="card-text">{{ $post->description }}</p>
                    <a href="#" class="btn btn-primary">View</a>
                </div>
            @endforeach
        </div>
   </div>
@endsection