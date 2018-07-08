@extends('layouts.app')

@section('content')
    <h1>Create Category</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('category.create') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name" class="col-form-label text-md-left">Category Name</label>
            <input id="name" name="name" type="text" class="form-control col-sm-4" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>
@endsection