<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Hash;

// -------------------
// UsersController
// -------------------

class UsersController extends Controller
{
    // -------------------
    // INDEX
    // -------------------
    public function index()
    {
        $users = User::with('role')->latest()->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    // -------------------
    // CREATE
    // -------------------
    public function create()
    {
        $roles = UserRole::all();
        return view('admin.users.create', compact('roles'));
    }

    // -------------------
    // STORE
    // -------------------
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'nullable|string|max:100',
            'email'      => 'required|email|unique:su_users,email',
            'phone'      => 'nullable|string|max:30',
            'role_id'    => 'required|integer',
            'password'   => 'required|string|min:8|confirmed',
            'status'     => 'required|in:active,suspended,pending',
            'why_join'   => 'nullable|string',
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'role_id'    => $request->role_id,
            'password'   => Hash::make($request->password),
            'status'     => $request->status,
            'why_join'   => $request->why_join,
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', 'User created successfully.');
    }

    // -------------------
    // SHOW
    // -------------------
    public function show($id)
    {
        $user = User::with(['role', 'lastLoginLog'])->findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    // -------------------
    // EDIT
    // -------------------
    public function edit($id)
    {
        $user  = User::findOrFail($id);
        $roles = UserRole::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    // -------------------
    // UPDATE
    // -------------------
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'nullable|string|max:100',
            'email'      => 'required|email|unique:su_users,email,' . $id,
            'phone'      => 'nullable|string|max:30',
            'role_id'    => 'required|integer',
            'status'     => 'required|in:active,suspended,pending',
            'why_join'   => 'nullable|string',
        ]);

        $data = $request->only([
            'first_name', 'last_name', 'email',
            'phone', 'role_id', 'status', 'why_join',
        ]);

        // -------------------
        // UPDATE PASSWORD IF PROVIDED
        // -------------------
        if ($request->filled('password')) {
            $request->validate([
                'password' => 'string|min:8|confirmed',
            ]);
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.users.index')
            ->with('success', 'User updated successfully.');
    }

    // -------------------
    // DELETE
    // -------------------
    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'User deleted successfully.');
    }
}