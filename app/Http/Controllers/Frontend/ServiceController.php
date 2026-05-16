<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;

// -------------------
// Frontend Service Controller
// -------------------

class ServiceController extends Controller
{
    // -------------------
    // SERVICES LIST PAGE
    // -------------------
    public function index()
    {
        $services = Service::where('status', 1)
            ->latest()
            ->paginate(9);

        return view('frontend.services.index', compact('services'));
    }

    // -------------------
    // SINGLE SERVICE PAGE
    // -------------------
    public function show($slug)
    {
        $service = Service::where('status', 1)
            ->where('slug', $slug)
            ->firstOrFail();

        return view('frontend.services.show', compact('service'));
    }
}