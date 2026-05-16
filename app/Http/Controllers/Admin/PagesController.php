<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// -------------------
// PagesController
// -------------------

class PagesController extends Controller
{
    // -------------------
    // INDEX
    // -------------------
    public function index()
    {
        return view('admin.' . strtolower(str_replace('Controller', '', 'PagesController')) . '.index');
    }

    // -------------------
    // CREATE
    // -------------------
    public function create()
    {
        return view('admin.' . strtolower(str_replace('Controller', '', 'PagesController')) . '.create');
    }

    // -------------------
    // STORE
    // -------------------
    public function store(Request $request)
    {
        //
    }

    // -------------------
    // SHOW
    // -------------------
    public function show($id)
    {
        return view('admin.' . strtolower(str_replace('Controller', '', 'PagesController')) . '.show', compact('id'));
    }

    // -------------------
    // EDIT
    // -------------------
    public function edit($id)
    {
        return view('admin.' . strtolower(str_replace('Controller', '', 'PagesController')) . '.edit', compact('id'));
    }

    // -------------------
    // UPDATE
    // -------------------
    public function update(Request $request, $id)
    {
        //
    }

    // -------------------
    // DELETE
    // -------------------
    public function destroy($id)
    {
        //
    }
}