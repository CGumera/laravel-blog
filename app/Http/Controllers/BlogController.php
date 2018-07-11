<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function __construct() {
        $this->middleware('auth',['except' => ['index', 'view']]);
    }

    public function index() {
        $blogs = Blog::all();
        return view('blog.index')->with('blogs', $blogs);
    }

    public function view($id) {
        $blog = Blog::find($id);
        $categories = Category::all();
        $data = [
            'blog' => $blog,
            'categories' => $categories
        ];
        return view('blog.view')->with('data', $data);
    }

    public function getCreate() {
        $categories = Category::all();
        return view('blog.create')->with('categories', $categories);
    }

    public function postCreate(Request $request) {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'content' => 'required'
        ]);

        //Handle file upload
        if ($request->hasFile('cover_image')) {
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $filenameToStore = $filename."_".time().".".$extension;
            $request->file('cover_image')->storeAs('public/cover_images', $filenameToStore);
        } else {
            $filenameToStore = 'noimage.jpg';
        }

        $blog = new Blog();
        $blog->user_id = Auth::id();
        $blog->title = $request->input('title');
        $blog->category_id = $request->input('category');
        $blog->content = $request->input('content');
        $blog->image_path = $filenameToStore;
        $blog->save();

        return redirect('/blog/view/'.$blog->id);
    }

    public function postDelete(Request $request, $id) {
        Blog::find($id)->delete();
        return redirect()->route('profile');
    }

    public function getEdit($id) {
        $blog = Blog::find($id);
        if (empty($blog) || $blog->user_id != Auth::id()) {
            return redirect()->route('profile');
        }
        $categories = Category::all();
        $data = [
            'blog' => $blog,
            'categories' => $categories
        ];
        return view('blog.edit')->with('data', $data);
    }

    public function postEdit(Request $request) {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'content' => 'required'
        ]);

        //Handle file upload
        if ($request->hasFile('cover_image')) {
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $filenameToStore = $filename."_".time().".".$extension;
            $request->file('cover_image')->storeAs('public/cover_images', $filenameToStore);
        }

        $blog = Blog::find($request->input('id'));
        $blog->title = $request->input('title');
        $blog->category_id = $request->input('category');
        $blog->content = $request->input('content');
        if ($request->hasFile('cover_image')) {
            $blog->image_path = $filenameToStore;
        }
        $blog->save();

        return redirect('/blog/view/'.$request->input('id'));
    }
}
