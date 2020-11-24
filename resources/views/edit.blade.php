@extends('layout')

@section('content')
    <div class="container">
        <div class="card shadow border-0">
            <div class="card-header bg-primary text-center text-white">
                Edit Your Post    
            </div>    

            <div class="card-body">
                <form action="{{url("/posts/$post->id")}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" value="{{$post->name}}">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                    <textarea name="description" class="form-control" cols="30" rows="10">{{$post->description}}</textarea>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{url("/posts")}}" class="btn btn-warning">Back</a>
                        <button class="btn btn-primary">Update Your Post</button>
                    </div>
                </form>
            </div>
        </div>    
    </div>    
@endsection