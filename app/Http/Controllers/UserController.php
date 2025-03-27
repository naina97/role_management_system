<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('company_id', auth()->user()->company_id)->get();
        return view('users.index', compact('users'));
    }

    public function assignRole(Request $request, User $user)
    {
        $user->syncRoles($request->role);
        return back()->with('success', 'Role assigned successfully');
    }
}
