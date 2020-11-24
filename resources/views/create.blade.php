@extends('layout')

@section('content')
    <div class="container">
        <div class="card shadow border-0">
            <div class="card-header bg-primary text-center text-white">
                New Post    
            </div>    

            <div class="card-body">
                <form action="/posts" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{route('posts')}}" class="btn btn-warning">Back</a>
                        <button class="btn btn-primary">Create New Post</button>
                    </div>
                </form>
            </div>
        </div>    
    </div>    
@endsection