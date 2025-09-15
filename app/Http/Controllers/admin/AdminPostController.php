<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function categories()
    {
        $categories = Post::select('category')->distinct()->get();
        return view('admin.posts.categories', compact('categories'));
    }

    public function store(Request $request)
    {
        Post::create($request->all());
        return redirect()->route('admin.posts.index');
    }
}
