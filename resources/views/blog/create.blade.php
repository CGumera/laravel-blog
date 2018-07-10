@extends('layouts.app')

@section('content')
    <h1>Create Blog</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ url('/blog/create') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select id="category" name="category" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea id="content" name="content" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="image_path">Image URL</label>
            <input type="text" id="image_path" name="image_path" class="form-control" required>
        </div>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>
@endsection

@section('scripts')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection