<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    public function index()
    {
        $images = Gallery::orderBy('sort_order')->latest()->paginate(20);
        return view('admin.gallery.index', compact('images'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
            'category'    => 'nullable|string|max:100',
            'sort_order'  => 'nullable|integer',
            'status'      => 'nullable|boolean',
        ]);

        $data['status']     = $request->has('status') ? 1 : 0;
        $data['sort_order'] = $request->input('sort_order', 0);
        $data['image']      = $this->upload($request->file('image'));

        Gallery::create($data);

        return redirect()->route('admin.gallery.index')->with('success', 'Image uploaded.');
    }

    public function edit($id)
    {
        $image = Gallery::findOrFail($id);
        return view('admin.gallery.edit', compact('image'));
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $data = $request->validate([
            'title'       => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'category'    => 'nullable|string|max:100',
            'sort_order'  => 'nullable|integer',
            'status'      => 'nullable|boolean',
        ]);

        $data['status']     = $request->has('status') ? 1 : 0;
        $data['sort_order'] = $request->input('sort_order', 0);

        if ($request->hasFile('image')) {
            $this->deleteFile($gallery->image);
            $data['image'] = $this->upload($request->file('image'));
        }

        $gallery->update($data);

        return redirect()->route('admin.gallery.index')->with('success', 'Image updated.');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $this->deleteFile($gallery->image);
        $gallery->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Image deleted.');
    }

    private function upload($file): string
    {
        $clean    = preg_replace('/[^A-Za-z0-9.\-_]/', '_', $file->getClientOriginalName());
        $filename = time() . '_' . $clean;
        $dest     = public_path('uploads/gallery');
        File::ensureDirectoryExists($dest, 0755, true);
        $file->move($dest, $filename);
        return $filename;
    }

    private function deleteFile(?string $filename): void
    {
        if ($filename) {
            $path = public_path('uploads/gallery/' . $filename);
            if (File::exists($path)) File::delete($path);
        }
    }
}
