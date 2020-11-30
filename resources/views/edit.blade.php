@extends('layout')

@section('content')
    <div class="container">
        <div class="card shadow border-0">
            <div class="card-header bg-primary text-center text-white">
                Edit Your Post    
            </div>    

            @if($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul class="list-group">
                        @foreach ($errors->all() as $error)
                            <li class="list-group-item">{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif 

            <div class="card-body">
                <form action="{{url("/posts/$post->id")}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" value="{{old('name', $post->name)}}">
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                    <textarea name="description" class="form-control" cols="30" rows="10">{{$post->description}}</textarea>
                    </div>

                    <select name="category_id" id="" class="form-control mb-5">
                        @foreach ($categories as $cat)
                        <option value="{{$cat->id}}" {{ $cat->id == $post->category_id ? "selected" : "" }}>{{$cat->name}}</option>
                        @endforeach
                    </select>

                    <div class="d-flex justify-content-between">
                        <a href="{{url('/posts')}}" class="btn btn-warning">Back</a>
                        <button class="btn btn-primary">Update Your Post</button>
                    </div>
                </form>
            </div>
        </div>    
    </div>    
@endsection