<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use App\Models\RateCardPackage;
use App\Models\Setting;

class PageController extends Controller
{
    public function biography()
    {
        $page     = PageContent::getPage('biography');
        $settings = Setting::first();
        return view('frontend.pages.biography', compact('page', 'settings'));
    }

    public function rateCard()
    {
        $settings  = Setting::first();
        $packages  = RateCardPackage::where('status', 1)
            ->orderBy('category')
            ->orderBy('sort_order')
            ->get()
            ->groupBy('category');

        return view('frontend.pages.rate-card', compact('packages', 'settings'));
    }

    public function privacy()
    {
        $page = PageContent::getPage('privacy-policy');
        return view('frontend.pages.privacy', compact('page'));
    }

    public function terms()
    {
        $page = PageContent::getPage('terms-conditions');
        return view('frontend.pages.terms', compact('page'));
    }
}
