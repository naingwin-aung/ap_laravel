@extends('layout')

@section('content')
   <div class="container">
        <div class="card mb-3 shadow border-0">
            <div class="card-header h4 bg-dark text-white ">
                {{$post->name}}
            </div>
                <div class="card-body">
                    <p class="card-text">{{ $post->description }}</p>
                <a href="{{url("/posts")}}" class="btn btn-warning">Back</a>
            </div>
        </div>
    </div>
@endsection