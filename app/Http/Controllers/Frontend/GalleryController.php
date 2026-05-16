<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $images     = Gallery::where('status', 1)->orderBy('sort_order')->paginate(24);
        $categories = Gallery::where('status', 1)->distinct()->pluck('category')->filter()->values();

        return view('frontend.pages.gallery', compact('images', 'categories'));
    }
}
