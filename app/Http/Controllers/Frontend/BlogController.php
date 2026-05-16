<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;

// -------------------
// Frontend Blog Controller
// -------------------

class BlogController extends Controller
{
    // -------------------
    // BLOG LIST PAGE
    // -------------------
    public function index()
    {
        $blogs = Blog::with('category')
            ->where('status', 'published')
            ->latest('published_at')
            ->paginate(9);

        return view('frontend.blog.index', compact('blogs'));
    }

    // -------------------
    // SINGLE BLOG PAGE
    // -------------------
    public function show($slug)
    {
        $blog = Blog::with('category')
            ->where('status', 'published')
            ->where('slug', $slug)
            ->firstOrFail();

        return view('frontend.blog.show', compact('blog'));
    }
}