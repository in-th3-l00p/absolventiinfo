<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
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
        $user->update($request->validate([
            "first_name" => "required|min:1",
            "last_name" => "required|min:1",
            "description" => "required",
            "email" => "required|email|min:1",
            "promotion_year" => "required|numeric",
            "class" => "required|in:A,B,C,D,E",
            "phone_number" => "required|min:1",
        ]));
        return redirect()->route("users.show", [
            "user" => $user
        ]);
    }

    // to be implemented
    public function destroy(User $user) {
    }
}
