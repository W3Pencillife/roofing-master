<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
public function showBySlug($category, $slug)
{
    $post = Post::where('category', $category)
                ->where('slug', $slug)
                ->firstOrFail();

    return view('layouts.services-page', compact('post'));
}




}
