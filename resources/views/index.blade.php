@extends('layouts.app')

@section('content')
    <h1>About</h1>
    <div>
        <p>
            This web application is a simple Blogging site where you can view, create, edit and delete blogs.
            Just <a href="{{ route('register')}}">Sign Up</a> to start writing a blog.
        </p>
        <p>
            This site is made from Laravel Framework and designed using Bootstrap library.
        </p>
    </div>
    <hr>
    <p>
        <strong>Disclamer:</strong> This Blog creates no claim or credit for images featured on this site unless otherwise noted.
        All images is copyrighted to it's respectful owners. If you own rights to any of the images, and do not wish them to
        appear here, please contact me at christopher.gumera@gmail.com so that I can remove them immediately.
    </p>
@endsection