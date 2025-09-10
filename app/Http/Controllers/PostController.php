<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function showBySlug($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail(); // fetch single post by slug
        return view('layouts.services-page', compact('post'));
    }
}
