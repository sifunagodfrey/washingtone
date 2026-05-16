<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Video;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::where('status', 1)->orderBy('sort_order')->paginate(12);
        return view('frontend.pages.videos', compact('videos'));
    }
}
