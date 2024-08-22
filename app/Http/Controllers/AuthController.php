<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        $rememberMe = $data['remember_me'] ? true : false;
        $user = [
            'username' => $data['username'],
            'password' => $data['kata_sandi'],
        ];

        if (! Auth::attempt($user, $rememberMe)) {
            return redirect()->route('auth.index')->with('error', 'Username dan password tidak cocok!');
        }

        return redirect()->route('dashboard');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('auth.index');
    }
}
