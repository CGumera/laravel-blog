@extends('layouts.app')

@section('content')
    <h1>Blogs</h1>
    @if(count($blogs) > 0)
        <div class="row mb-2">
        @foreach($blogs as $blog)
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <strong class="d-inline-block mb-2 text-success">{{ $blog->category->category }}</strong>
                        <h2 class="mb-0">
                            <a class="text-dark" href="/blog/view/{{$blog->id}}">{{ $blog->title }}</a>
                        </h2>
                        <div class="mb-1 text-muted">{{ $blog->created_at->format('Y-m-d') }}</div>
                        <p class="card-text mb-auto">{!! \Illuminate\Support\Str::limit($blog->content, $limit = '110', $end = '...') !!}</p>
                        <a href="/blog/view/{{$blog->id}}">Continue reading</a>
                    </div>
                    <img class="card-img-right flex-auto d-none d-lg-block" alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="{{ $blog->image_path }}">
                </div>
            </div>
        @endforeach
        </div>
    @else
        <p>No Blogs to Display</p>
    @endif
@endsection