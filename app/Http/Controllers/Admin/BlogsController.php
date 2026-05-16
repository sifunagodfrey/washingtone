<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

// -------------------
// Blogs Controller
// -------------------

class BlogsController extends Controller
{
    // -------------------
    // LIST BLOGS
    // -------------------
    public function index()
    {
        $blogs = Blog::with('category')
            ->latest()
            ->paginate(10);

        return view('admin.blogs.index', compact('blogs'));
    }

    // -------------------
    // CREATE BLOG FORM
    // -------------------
    public function create()
    {
        $categories = BlogCategory::all();

        return view('admin.blogs.create', compact('categories'));
    }

    // -------------------
    // STORE BLOG
    // -------------------
    public function store(Request $request)
    {
        // -------------------
        // VALIDATION
        // -------------------
        $data = $request->validate([
            'category_id' => 'nullable|integer',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|in:draft,published',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // -------------------
        // SYSTEM FIELDS
        // -------------------
        $data['slug'] = Str::slug($data['title']);
        $data['author_id'] = $request->user()->id;
        $data['published_at'] = $data['status'] === 'published' ? now() : null;

        // -------------------
        // IMAGE UPLOAD (REFORMATTED LIKE SERVICES)
        // -------------------
        if ($request->hasFile('featured_image')) {

            $file = $request->file('featured_image');

            $originalName = $file->getClientOriginalName();

            // clean filename (same rule as services)
            $cleanName = preg_replace('/[^A-Za-z0-9\.\-_]/', '_', $originalName);

            $filename = time() . '_' . $cleanName;

            $destinationPath = public_path('uploads/blogs');

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);

            $data['featured_image'] = $filename;
        }

        // -------------------
        // CREATE BLOG
        // -------------------
        Blog::create($data);

        return redirect()
            ->route('admin.blogs.index')
            ->with('success', 'Blog created successfully');
    }

    // -------------------
    // EDIT BLOG FORM
    // -------------------
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = BlogCategory::all();

        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    // -------------------
    // UPDATE BLOG
    // -------------------
    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        // -------------------
        // VALIDATION
        // -------------------
        $data = $request->validate([
            'category_id' => 'nullable|integer',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|in:draft,published',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // -------------------
        // SYSTEM FIELDS
        // -------------------
        $data['slug'] = Str::slug($data['title']);
        $data['published_at'] = $data['status'] === 'published'
            ? ($blog->published_at ?? now())
            : null;

        // -------------------
        // IMAGE UPLOAD (SAME PATTERN AS SERVICES)
        // -------------------
        if ($request->hasFile('featured_image')) {

            $file = $request->file('featured_image');

            $originalName = $file->getClientOriginalName();

            $cleanName = preg_replace('/[^A-Za-z0-9\.\-_]/', '_', $originalName);

            $filename = time() . '_' . $cleanName;

            $destinationPath = public_path('uploads/blogs');

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);

            // delete old image
            if ($blog->featured_image && File::exists(public_path('uploads/blogs/' . $blog->featured_image))) {
                File::delete(public_path('uploads/blogs/' . $blog->featured_image));
            }

            $data['featured_image'] = $filename;
        }

        // -------------------
        // UPDATE BLOG
        // -------------------
        $blog->update($data);

        return redirect()
            ->route('admin.blogs.index')
            ->with('success', 'Blog updated successfully');
    }

    // -------------------
    // SHOW SINGLE BLOG
    // -------------------
    public function show($id)
    {
        $blog = Blog::findOrFail($id);

        return view('admin.blogs.show', compact('blog'));
    }

    // -------------------
    // DELETE BLOG
    // -------------------
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        // delete image file
        if ($blog->featured_image && File::exists(public_path('uploads/blogs/' . $blog->featured_image))) {
            File::delete(public_path('uploads/blogs/' . $blog->featured_image));
        }

        $blog->delete();

        return redirect()
            ->route('admin.blogs.index')
            ->with('success', 'Blog deleted successfully');
    }
}