<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct() {
        $this->authorizeResource(User::class);
    }

    // not implemented
    public function index() { }

    // not implemented
    public function create() {  }

    // not implemented
    public function store(Request $request) {  }

    // profile page
    public function show(User $user) {
        return view("users.show", [
            "user" => $user,
            "current_user" => $user->id === Auth::user()->id
        ]);
    }

    // edit profile page
    public function edit(User $user) {
        return view("users.edit", [
            "user" => $user
        ]);
    }

    public function update(Request $request, User $user) {
        $data = $request->validate([
            "first_name" => "required|min:1|max:50",
            "last_name" => "required|min:1|max:50",
            "description" => "nullable|max:500",
            "email" => "required|email|min:1|max:255" . ($request->email === $user->email ? "" : "|unique:users,email"),
            "promotion_year" => "required|numeric|max:" . now()->year,
            "class" => "required|in:A,B,C,D,E",
            "phone_number" => "required|min:1|max:12",
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
            "phone_number.max" => "Numarul de caractere poate avea maxim 12 de caractere"
        ]);
        if ($data["promotion_year"] < 1600 || $data["promotion_year"] > now()->year)
            return back()->withErrors([
                "promotion_year" => "Anul de absolvire trebuie sa fie intre " . 1600 . " si " . now()->year
            ]);

        $user->update($data);

        return redirect()->route("users.show", [
            "user" => $user
        ]);
    }

    // to be implemented
    public function destroy(User $user) {
    }

    public function activities() {
        $this->authorize("activities");
        return view("users.activities", [
            "activities" => Auth::user()
                ->activities()
                ->withPivot("accepted")
                ->orderBy("accepted", "desc")
                ->orderBy("start", "asc")
                ->paginate(5)
        ]);
    }
}
