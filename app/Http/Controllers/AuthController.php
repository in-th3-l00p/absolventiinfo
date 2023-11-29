<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ], [
            "email.required" => "Campul de email este necesar",
            "password.required" => "Campul de parola este necesar",
        ]);

        if (!Auth::attempt($credentials))
            return back()->withErrors([
                "email" => "Emailul sau parola este gresita"
            ]);

        return redirect()->route("index");
    }

    public function logout(Request $request) {
        Auth::logout();
        session()->invalidate();
        return redirect()->route("login");
    }
}
