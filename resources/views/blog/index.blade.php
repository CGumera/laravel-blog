@extends('layouts.app')

@section('content')
    <h1>Blogs</h1>
    @if(count($blogs) > 0)
        <ul class="list-group">
            @foreach($blogs as $blog)
                <li class="list-group-item">
                    <a href="/blog/view/{{$blog->id}}">{{ $blog->title }}</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>No Blogs to Display</p>
    @endif
@endsection