<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $categories = Categories::all();
        return view('categories.index')->with('categories', $categories);
    }

    public function getCreate() {
        return view('categories.create');
    }

    public function postCreate(Request $request) {
        $request->validate([
            'name' => 'required'
        ]);

        $category = new Categories();
        $category->category = $request->input('name');
        $category->save();
        return redirect()->route('category.index');
    }
}
