<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort_order')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'             => 'required|string|max:255',
            'short_description' => 'nullable|string|max:300',
            'description'       => 'nullable|string',
            'features'          => 'nullable|array',
            'features.*'        => 'nullable|string|max:255',
            'icon'              => 'nullable|string|max:255',
            'image'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status'            => 'nullable|boolean',
            'sort_order'        => 'nullable|integer',
        ]);

        $data['status']     = $request->has('status') ? 1 : 0;
        $data['sort_order'] = $request->input('sort_order', 0);
        $data['slug']       = $this->uniqueSlug($data['title']);
        $data['features']   = array_filter($request->input('features', []));

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request->file('image'), 'services');
        }

        Service::create($data);

        return redirect()->route('admin.services.index')->with('success', 'Service created.');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $data = $request->validate([
            'title'             => 'required|string|max:255',
            'short_description' => 'nullable|string|max:300',
            'description'       => 'nullable|string',
            'features'          => 'nullable|array',
            'features.*'        => 'nullable|string|max:255',
            'icon'              => 'nullable|string|max:255',
            'image'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status'            => 'nullable|boolean',
            'sort_order'        => 'nullable|integer',
        ]);

        $data['status']     = $request->has('status') ? 1 : 0;
        $data['sort_order'] = $request->input('sort_order', 0);
        $data['slug']       = $this->uniqueSlug($data['title'], $service->id);
        $data['features']   = array_filter($request->input('features', []));

        if ($request->hasFile('image')) {
            $this->deleteImage('services', $service->image);
            $data['image'] = $this->uploadImage($request->file('image'), 'services');
        }

        $service->update($data);

        return redirect()->route('admin.services.index')->with('success', 'Service updated.');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $this->deleteImage('services', $service->image);
        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service deleted.');
    }

    private function uploadImage($file, string $folder): string
    {
        $clean    = preg_replace('/[^A-Za-z0-9.\-_]/', '_', $file->getClientOriginalName());
        $filename = time() . '_' . $clean;
        $dest     = public_path("uploads/$folder");
        File::ensureDirectoryExists($dest, 0755, true);
        $file->move($dest, $filename);
        return $filename;
    }

    private function deleteImage(string $folder, ?string $filename): void
    {
        if ($filename) {
            $path = public_path("uploads/$folder/$filename");
            if (File::exists($path)) File::delete($path);
        }
    }

    private function uniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $slug = $base = Str::slug($title);
        $n    = 1;
        while (Service::where('slug', $slug)->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = $base . '-' . $n++;
        }
        return $slug;
    }
}
