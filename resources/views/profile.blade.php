@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if(count($blogs) > 0)
                        <ul class="list-group">
                        @foreach($blogs as $blog)
                            <li class="list-group-item">
                                <div class="float-left">
                                    <strong>{{ $blog->title }}</strong> - created on: {{ $blog->created_at }}
                                </div>

                                <div class="float-right">
                                    <form action="{{ url('blog/delete', ['id' => $blog->id])}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>

                                <div class="float-right">
                                    <a href="/blog/edit/{{ $blog->id }}" class="btn btn-primary btn-sm">Edit</a>
                                </div>
                            </li>
                        @endforeach
                        </ul>
                    @else
                        <p>No Created Blogs</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
