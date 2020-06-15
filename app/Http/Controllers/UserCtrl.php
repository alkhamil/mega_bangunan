<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\User;
use App\Role;

class UserCtrl extends Controller
{
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('user.index', compact('users', 'roles'));
    }

    public function tambah(Request $request)
    {
        $user = new User;
        $user->role_id = $request->role_id;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('user')->with('msg', 'Data user berhasil dibuat!');
    }
}
