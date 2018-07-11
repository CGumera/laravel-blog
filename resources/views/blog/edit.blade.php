@extends('layouts.app')

@section('content')
    <h1>Edit Blog</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ url('/blog/edit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $data['blog']->id }}">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ $data['blog']->title }}" required>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select id="category" name="category" class="form-control" required>
                @foreach($data['categories'] as $category)
                    <option value="{{ $category->id }}"
                        @if ($category->id == old('category', $data['blog']->category_id))
                        selected="selected"
                        @endif>
                        {{ $category->category }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea id="content" name="content" class="form-control" required>{{ $data['blog']->content }}</textarea>
        </div>
        <div class="form-group">
            <label for="cover_image">Image: </label>
            <input type="file" id="cover_image" name="cover_image">
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