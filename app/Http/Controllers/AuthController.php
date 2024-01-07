<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function signin() {
        return view('auth/signin', ['title' => 'Sign In']);
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'username' => 'required|min:6',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }
        
        return back()->with('failed', 'The provided credentials do not match our records.');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'You are successfully signed out!');
    }

    public function signup() {
        return view('auth/signup', ['title' => 'Sign Up']);
    }

    public function register(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns|min:6|unique:users',
            'username' => 'required|min:6|unique:users',
            'password' => 'required|min:6',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        $validated['image'] = 'profile-images/default-profile-image.png';

        User::create($validated);

        return redirect('signin')->with('success', 'Your account has been successfully created. Please sign in!');
    }
}
