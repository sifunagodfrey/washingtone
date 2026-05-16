<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use Illuminate\Support\Str;

// -------------------
// Blog Categories Controller
// -------------------

class BlogCategoriesController extends Controller
{
    // -------------------
    // LIST
    // -------------------
    public function index()
    {
        $categories = BlogCategory::latest()->paginate(10);

        return view('admin.blog-categories.index', compact('categories'));
    }

    // -------------------
    // CREATE
    // -------------------
    public function create()
    {
        return view('admin.blog-categories.create');
    }

    // -------------------
    // STORE
    // -------------------
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:150',
            'description' => 'nullable|string',
        ]);

        $data['slug'] = Str::slug($data['name']);

        BlogCategory::create($data);

        return redirect()
            ->route('admin.blog-categories.index')
            ->with('success', 'Category created successfully');
    }

    // -------------------
    // EDIT
    // -------------------
    public function edit($id)
    {
        $category = BlogCategory::findOrFail($id);

        return view('admin.blog-categories.edit', compact('category'));
    }

    // -------------------
    // UPDATE
    // -------------------
    public function update(Request $request, $id)
    {
        $category = BlogCategory::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:150',
            'description' => 'nullable|string',
        ]);

        $data['slug'] = Str::slug($data['name']);

        $category->update($data);

        return redirect()
            ->route('admin.blog-categories.index')
            ->with('success', 'Category updated successfully');
    }

    // -------------------
    // DELETE
    // -------------------
    public function destroy($id)
    {
        $category = BlogCategory::findOrFail($id);

        $category->delete();

        return redirect()
            ->route('admin.blog-categories.index')
            ->with('success', 'Category deleted successfully');
    }
}