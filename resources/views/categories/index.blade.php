@extends('layouts.app')

@section('content')
    <h1>Categories</h1>
    <ul class="list-group">
        @if(count($categories) > 0)
            @foreach($categories as $category)
                <li class="list-group-item">{{ $category->category }}</li>
            @endforeach
        @else
            <p>No Categories to display</p>
        @endif
        <hr>
    </ul>
    <a class="btn btn-primary" href="{{ route('category.create') }}">Create Category</a>
@endsection