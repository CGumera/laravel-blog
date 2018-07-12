@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-9">
            <div>
                <a href="{{ $data['blog']->image_path }}">
                    <img src="/storage/cover_images/{{ $data['blog']->image_path }}" style="width: 100%; height: 450px;">
                </a>
            </div>

            <h1>{{ $data['blog']->title }}</h1>
            <p>Written by: <strong>{{ $data['blog']->user->name }}</strong> on: <strong>{{ $data['blog']->created_at->format('Y-m-d') }}</strong>
            <div>
                {!! $data['blog']->content !!}
            </div>
        </div>
        <div>
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
            </form>
            <hr>
            <h3 class="text-success">Categories</h3>
            <ul class="list-group">
                @foreach($data['categories'] as $category)
                    <li class="list-group">
                        <a href="/blog/category/view/{{ $category->id }}" class="text-dark">{{ $category->category }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection