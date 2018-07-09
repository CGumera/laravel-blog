<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index() {
        $blogs = Blog::all();
        return view('index')->with('blogs', $blogs);
    }

    public function profile() {
        $blogs = Blog::where('user_id', Auth::id())->get();
        return view('profile')->with('blogs', $blogs);
    }
}
