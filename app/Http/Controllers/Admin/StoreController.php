<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StoreProduct;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    public function index()
    {
        $products = StoreProduct::orderBy('sort_order')->latest()->paginate(15);
        return view('admin.store.index', compact('products'));
    }

    public function create()
    {
        return view('admin.store.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'             => 'required|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'description'       => 'nullable|string',
            'price'             => 'required|numeric|min:0',
            'image'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'stock_quantity'    => 'nullable|integer|min:0',
            'is_featured'       => 'nullable|boolean',
            'status'            => 'required|in:active,inactive',
            'sort_order'        => 'nullable|integer',
        ]);

        $data['slug']        = $this->uniqueSlug($data['title']);
        $data['is_featured'] = $request->has('is_featured') ? 1 : 0;
        $data['sort_order']  = $request->input('sort_order', 0);

        if ($request->hasFile('image')) {
            $data['image'] = $this->upload($request->file('image'));
        }

        StoreProduct::create($data);

        return redirect()->route('admin.store.index')->with('success', 'Product created.');
    }

    public function edit($id)
    {
        $product = StoreProduct::findOrFail($id);
        return view('admin.store.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = StoreProduct::findOrFail($id);

        $data = $request->validate([
            'title'             => 'required|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'description'       => 'nullable|string',
            'price'             => 'required|numeric|min:0',
            'image'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'stock_quantity'    => 'nullable|integer|min:0',
            'is_featured'       => 'nullable|boolean',
            'status'            => 'required|in:active,inactive',
            'sort_order'        => 'nullable|integer',
        ]);

        $data['slug']        = $this->uniqueSlug($data['title'], $product->id);
        $data['is_featured'] = $request->has('is_featured') ? 1 : 0;
        $data['sort_order']  = $request->input('sort_order', 0);

        if ($request->hasFile('image')) {
            $this->deleteFile($product->image);
            $data['image'] = $this->upload($request->file('image'));
        }

        $product->update($data);

        return redirect()->route('admin.store.index')->with('success', 'Product updated.');
    }

    public function destroy($id)
    {
        $product = StoreProduct::findOrFail($id);
        $this->deleteFile($product->image);
        $product->delete();

        return redirect()->route('admin.store.index')->with('success', 'Product deleted.');
    }

    private function upload($file): string
    {
        $clean    = preg_replace('/[^A-Za-z0-9.\-_]/', '_', $file->getClientOriginalName());
        $filename = time() . '_' . $clean;
        $dest     = public_path('uploads/store');
        File::ensureDirectoryExists($dest, 0755, true);
        $file->move($dest, $filename);
        return $filename;
    }

    private function deleteFile(?string $filename): void
    {
        if ($filename) {
            $p = public_path('uploads/store/' . $filename);
            if (File::exists($p)) File::delete($p);
        }
    }

    private function uniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $slug = $base = Str::slug($title);
        $n    = 1;
        while (StoreProduct::where('slug', $slug)->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = $base . '-' . $n++;
        }
        return $slug;
    }
}
