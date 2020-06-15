<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class LoginCtrl extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $username = $request->username;
        $password = $request->password;
        $user = User::where('username', $username)->first();
        if ($user !== null) {
            if (password_verify($password, $user->password)) {
                Auth::attempt(['username' => $username, 'password' => $password]);
                return redirect('dashboard');
            }else {
                return back()->with('msg', 'Password tidak sesuai!');    
            }
        }else {
            return back()->with('msg', 'Akun tidak terdaftar!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
