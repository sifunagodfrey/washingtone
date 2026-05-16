<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RateCardPackage;

class RateCardController extends Controller
{
    public function index()
    {
        $packages = RateCardPackage::orderBy('category')->orderBy('sort_order')->paginate(20);
        return view('admin.rate-card.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.rate-card.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category'     => 'required|string|max:100',
            'title'        => 'required|string|max:255',
            'description'  => 'nullable|string',
            'price'        => 'required|numeric|min:0',
            'price_suffix' => 'nullable|string|max:50',
            'features'     => 'nullable|array',
            'features.*'   => 'nullable|string|max:255',
            'is_featured'  => 'nullable|boolean',
            'status'       => 'nullable|boolean',
            'sort_order'   => 'nullable|integer',
        ]);

        $data['is_featured'] = $request->has('is_featured') ? 1 : 0;
        $data['status']      = $request->has('status') ? 1 : 0;
        $data['features']    = array_filter($request->input('features', []));

        RateCardPackage::create($data);

        return redirect()->route('admin.rate-card.index')->with('success', 'Package created.');
    }

    public function edit($id)
    {
        $package = RateCardPackage::findOrFail($id);
        return view('admin.rate-card.edit', compact('package'));
    }

    public function update(Request $request, $id)
    {
        $package = RateCardPackage::findOrFail($id);

        $data = $request->validate([
            'category'     => 'required|string|max:100',
            'title'        => 'required|string|max:255',
            'description'  => 'nullable|string',
            'price'        => 'required|numeric|min:0',
            'price_suffix' => 'nullable|string|max:50',
            'features'     => 'nullable|array',
            'features.*'   => 'nullable|string|max:255',
            'is_featured'  => 'nullable|boolean',
            'status'       => 'nullable|boolean',
            'sort_order'   => 'nullable|integer',
        ]);

        $data['is_featured'] = $request->has('is_featured') ? 1 : 0;
        $data['status']      = $request->has('status') ? 1 : 0;
        $data['features']    = array_filter($request->input('features', []));

        $package->update($data);

        return redirect()->route('admin.rate-card.index')->with('success', 'Package updated.');
    }

    public function destroy($id)
    {
        RateCardPackage::findOrFail($id)->delete();
        return redirect()->route('admin.rate-card.index')->with('success', 'Package deleted.');
    }
}
