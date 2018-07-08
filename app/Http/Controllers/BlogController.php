<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function getCreate() {
        $categories = Categories::all();
        return view('blog.create')->with('categories', $categories);
    }

    public function postCreate(Request $request) {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'content' => 'required'
        ]);

        $blog = new Blog();
        $blog->user_id = Auth::id();
        $blog->title = $request->input('title');
        $blog->category_id = $request->input('category');
        $blog->content = $request->input('content');
        $blog->save();

        return view('index');
    }
}
