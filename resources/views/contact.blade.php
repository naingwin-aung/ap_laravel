@extends('layout')

@section('content')
    <h4>This is contact Page</h4>
    @foreach($data as $key => $value)
        <p>{{ $key }} - {{ $value }}</p>
    @endforeach
@endsection