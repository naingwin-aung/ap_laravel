@extends('layout')

@section('content')
    <div class="container">
        <div class="card shadow border-0">
            <div class="card-header bg-primary text-center text-white">
                New Post    
            </div>    

            {{-- @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-group">
                        @foreach ($errors->all() as $error)
                            <li class="list-group-item">{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
            
            <div class="card-body">
                <form action="/posts" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                    <input type="text" name="name" class="@error('name') is-invalid @enderror form-control" value="{{old('name')}}">

                    @error('name')
                            <div class="alert alert-danger mt-3">
                                {{$message}}
                            </div>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" class="@error('description') is-invalid @enderror form-control" cols="30" rows="10">{{old('description')}}</textarea>

                        @error('description')
                            <div class="alert alert-danger mt-3">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <select name="category_id" id="" class="form-control mb-5 @error           ('category') is-invalid @enderror">
                        <option value="" disabled selected>Select Category</option>
                        @foreach ($category as $cat)
                            <option value="{{$cat->id}}">{{old('category', $cat->name)}}</option>
                        @endforeach
                    </select>

                    @error('category')
                        <div class="alert alert-danger mt-3">
                            {{$message}}
                        </div>
                    @enderror

                    <div class="d-flex justify-content-between">
                        <a href="{{url('/posts')}}" class="btn btn-warning">Back</a>
                        <button class="btn btn-primary">Create New Post</button>
                    </div>
                </form>
            </div>
        </div>    
    </div>    
@endsection