<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Blog;
use App\Models\Gallery;
use App\Models\Video;
use App\Models\Setting;
use App\Models\RateCardPackage;

class HomeController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        $services = Service::where('status', 1)->orderBy('sort_order')->take(6)->get();
        $blogs    = Blog::where('status', 'published')->latest('published_at')->take(3)->get();
        $gallery  = Gallery::where('status', 1)->orderBy('sort_order')->take(8)->get();
        $packages = RateCardPackage::where('status', 1)->where('is_featured', 1)->orderBy('sort_order')->get();

        return view('frontend.pages.home', compact('settings', 'services', 'blogs', 'gallery', 'packages'));
    }
}
