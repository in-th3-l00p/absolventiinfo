<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    public function register(Request $request) {
        $credentials = $request->validate([
            "first_name" => "required|min:1|max:50",
            "last_name" => "required|min:1|max:50",
            "description" => "nullable|max:500",
            "email" => "required|email|min:1|max:255|unique:users,email",
            "promotion_year" => "required|numeric|max:" . now()->year,
            "class" => "required|in:A,B,C,D,E",
            "phone_number" => "required|min:1|max:12",
            "password" => "required|min:8|confirmed",
            "cv_link" => "nullable|url|max:255",
            "facebook_link" => "nullable|url|max:255",
            "instagram_link" => "nullable|url|max:255",
            "linkedin_link" => "nullable|url|max:255"
        ], [
            "first_name.required" => "Numele este necesar",
            "first_name.max" => "Numele poate avea maxim 50 de caractere",
            "last_name.required" => "Prenumele este necesar",
            "last_name.max" => "Prenumele poate avea maxim 50 de caractere",
            "description.max" => "Descrierea poate avea maxim 500 de caractere",
            "email.required" => "Emailul este necesar",
            "email.unique" => "Emailul este deja folosit",
            "email.max" => "Emailul poate avea maxim 255 de caractere",
            "promotion_year.required" => "Anul de absolvire este necesar",
            "class.required" => "Clasa este necesara",
            "class.in" => "Clasa trebuie sa fie: A, B, C, D sau E",
            "phone_number.required" => "Numarul de telefon este necesar",
            "phone_number.max" => "Numarul de caractere poate avea maxim 12 de caractere",
            "cv_link.url" => "Linkul catre CV trebuie sa fie un URL valid",
            "cv_link.max" => "Linkul catre CV poate avea maxim 255 de caractere",
            "facebook_link.url" => "Linkul catre Facebook trebuie sa fie un URL valid",
            "facebook_link.max" => "Linkul catre Facebook poate avea maxim 255 de caractere",
            "instagram_link.url" => "Linkul catre Instagram trebuie sa fie un URL valid",
            "instagram_link.max" => "Linkul catre Instagram poate avea maxim 255 de caractere",
            "linkedin_link.url" => "Linkul catre LinkedIn trebuie sa fie un URL valid",
            "linkedin_link.max" => "Linkul catre LinkedIn poate avea maxim 255 de caractere",
            "password.required" => "Parola este necesara",
            "password.min" => "Parola trebuie sa aiba minim 8 caractere",
            "password.confirmed" => "Parolele nu se potrivesc"
        ]);
        if ($credentials["promotion_year"] < 1600 || $credentials["promotion_year"] > now()->year)
            return back()->withErrors([
                "promotion_year" => "Anul de absolvire trebuie sa fie intre " . 1600 . " si " . now()->year
            ]);

        $user = User::create([
            ...$credentials,
            "password_changed" => 1
        ]);
        if ($request->hasFile('pfp')) {
            $validatedData = $request->validate([
                'pfp' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $pfp_path = Storage::disk('public')
                ->putFile("pfp", $request->file("pfp"));
            $user->update([
                "pfp_path" => $pfp_path
            ]);
        }

        Auth::login($user);
        return redirect()->route("index");
    }
}
