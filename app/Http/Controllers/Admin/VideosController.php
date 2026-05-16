<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;

class VideosController extends Controller
{
    public function index()
    {
        $videos = Video::orderBy('sort_order')->latest()->paginate(15);
        return view('admin.videos.index', compact('videos'));
    }

    public function create()
    {
        return view('admin.videos.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'youtube_url' => 'required|url|max:500',
            'sort_order'  => 'nullable|integer',
            'status'      => 'nullable|boolean',
        ]);

        $data['status']     = $request->has('status') ? 1 : 0;
        $data['sort_order'] = $request->input('sort_order', 0);

        Video::create($data); // youtube_id auto-extracted by model mutator

        return redirect()->route('admin.videos.index')->with('success', 'Video added.');
    }

    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('admin.videos.edit', compact('video'));
    }

    public function update(Request $request, $id)
    {
        $video = Video::findOrFail($id);

        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'youtube_url' => 'required|url|max:500',
            'sort_order'  => 'nullable|integer',
            'status'      => 'nullable|boolean',
        ]);

        $data['status']     = $request->has('status') ? 1 : 0;
        $data['sort_order'] = $request->input('sort_order', 0);

        $video->fill($data)->save(); // mutator re-extracts youtube_id

        return redirect()->route('admin.videos.index')->with('success', 'Video updated.');
    }

    public function destroy($id)
    {
        Video::findOrFail($id)->delete();
        return redirect()->route('admin.videos.index')->with('success', 'Video deleted.');
    }
}
