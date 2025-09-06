<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function showBySlug($slug)
    {
        // Find posts by slug
        $posts = Post::where('slug', $slug)->get();

        // Get the category name for display
        $category = $posts->first()?->category ?? 'Unknown Category';

        return view('layouts.services-page', compact('posts', 'category'));
    }
}
