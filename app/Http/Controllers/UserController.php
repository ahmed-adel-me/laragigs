<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create()
    {
        return view("users.register");
    }
    public function store(Request $request)
    {
        $formInputs = $request->validate([
            "name" => "required|min:3",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:8|confirmed",
        ]);
        $formInputs['password'] = bcrypt($formInputs['password']);
        $user = User::create($formInputs);
        auth()->login($user);
        return redirect('/')->with('message', 'User created and logged in successfully!');
    }
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'Logged out successfully');
    }
    public function login(Request $request)
    {
        return view('users.login');
    }
    public function authenticate(Request $request)
    {
        $formInputs = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($formInputs)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are now logged in!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
