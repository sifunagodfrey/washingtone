<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageContent;

class PageContentController extends Controller
{
    // Managed pages with their friendly labels
    private const PAGES = [
        'biography'       => 'Biography',
        'privacy-policy'  => 'Privacy Policy',
        'terms-conditions'=> 'Terms & Conditions',
        'home'            => 'Home (About Section)',
    ];

    public function index()
    {
        $pages = collect(self::PAGES)->map(function ($label, $slug) {
            return PageContent::firstOrCreate(
                ['page_slug' => $slug],
                ['title'     => $label]
            );
        });

        return view('admin.page-content.index', compact('pages'));
    }

    public function edit($slug)
    {
        abort_unless(array_key_exists($slug, self::PAGES), 404);

        $page = PageContent::firstOrCreate(
            ['page_slug' => $slug],
            ['title'     => self::PAGES[$slug]]
        );

        return view('admin.page-content.edit', compact('page', 'slug'));
    }

    public function update(Request $request, $slug)
    {
        abort_unless(array_key_exists($slug, self::PAGES), 404);

        $data = $request->validate([
            'title'            => 'nullable|string|max:255',
            'content'          => 'nullable|string',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
        ]);

        PageContent::updateOrCreate(
            ['page_slug' => $slug],
            $data
        );

        return redirect()->route('admin.page-content.index')->with('success', self::PAGES[$slug] . ' updated.');
    }
}
