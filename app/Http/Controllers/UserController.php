<?php

namespace App\Http\Controllers;

use App\Jobs\UploadUsers;
use App\Mail\WelcomeMail;
use App\Models\Activity;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Queue\Queue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laravel\Sanctum\Guard;
use Mockery\Generator\StringManipulation\Pass\Pass;
use function Laravel\Prompts\warning;

class UserController extends Controller
{
    public function __construct() {
        $this->authorizeResource(User::class);
    }

    // not implemented
    public function index() { }

    // not implemented
    public function create() { }

    // not implemented
    public function store(Request $request) {  }

    // profile page
    public function show(User $user) {
        return view("users.show", [
            "user" => $user,
            "current_user" => Auth::check() && $user->id === Auth::user()->id
        ]);
    }

    // edit profile page
    public function edit(User $user) {
        return view("users.edit", [
            "user" => $user
        ]);
    }

    public function editPassword() {
        return view("users.editPassword");
    }

    public function updatePassword(Request $request) {
        $data = $request->validate([
            "current_password" => "required",
            "password" => "required|min:8|max:255|confirmed"
        ], [
            "password.required" => "Parola este necesara",
            "password.min" => "Parola trebuie sa aiba minim 8 caractere",
            "password.max" => "Parola poate avea maxim 255 de caractere",
            "password.confirmed" => "Parolele nu se potrivesc"
        ]);

        if (!Hash::check($data["current_password"], Auth::user()->password))
            return back()->withErrors([
                "current_password" => "Parola curenta nu este corecta"
            ]);

        Auth::user()->update([
            "password" => bcrypt($data["password"])
        ]);

        return redirect()->route("users.edit", [
            "user" => Auth::user()
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
            "linkedin_link.max" => "Linkul catre LinkedIn poate avea maxim 255 de caractere"
        ]);
        if ($data["promotion_year"] < 1600 || $data["promotion_year"] > now()->year)
            return back()->withErrors([
                "promotion_year" => "Anul de absolvire trebuie sa fie intre " . 1600 . " si " . now()->year
            ]);
        if ($request->hasFile('pfp')) {
            $validatedData = $request->validate([
                'pfp' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($user->pfp_path)
                Storage::disk('public')
                    ->delete($user->pfp_path);
            $pfp_path = Storage::disk('public')
                ->putFile("pfp", $request->file("pfp"));
            $user->update([
                "pfp_path" => $pfp_path
            ]);
        }

        $user->update($data);

        return redirect()->route("users.show", [
            "user" => $user
        ]);
    }

    public function destroy(User $user) {
        $user->delete();
        return redirect()->back();
    }

    public function activities() {
        Gate::allowIf(fn (User $user) => $user->role === "user");
        return view("users.activities", [
            "activities" => Auth::user()
                ->activities()
                ->withPivot("accepted")
                ->orderBy("accepted", "desc")
                ->orderBy("start", "asc")
                ->paginate(5)
        ]);
    }

    public function upload(Request $request) {
        $data = $request->validate([
            "file" => "required|file"
        ]);

        UploadUsers::dispatch(file_get_contents($data["file"]->getRealPath()));
        return redirect()->back();
    }

    public function destroyPfp(User $user) {
        Gate::allowIf(fn (User $auth) =>
            $auth->id === $user->id || $auth->role === "admin"
        );
        if ($user->pfp_path)
            Storage::disk('public')
                ->delete($user->pfp_path);
        $user->update([
            "pfp_path" => null
        ]);
        return redirect()->back();
    }

    public function passwordChange() {
        Gate::allowIf(fn (User $user) => !$user->password_changed);
        return view("users.passwordChange");
    }

    public function passwordChangeSubmit(Request $request) {
        Gate::allowIf(fn (User $user) => !$user->password_changed);
        $data = $request->validate([
            "password" => "required|min:8|max:255|confirmed"
        ], [
            "password.required" => "Parola este necesara",
            "password.min" => "Parola trebuie sa aiba minim 8 caractere",
            "password.max" => "Parola poate avea maxim 255 de caractere",
            "password.confirmed" => "Parolele nu se potrivesc"
        ]);

        Auth::user()->update([
            "password" => Hash::make($data["password"]),
            "password_changed" => 1
        ]);

        return redirect()->route("users.show", [
            "user" => Auth::user()
        ]);
    }

    public function resetPasswordForm() {
        return view("users.resetPasswordRequest");
    }

    public function resetPasswordSubmit(Request $request) {
        $user = User::where("email", $request->email)->first();
        if (!$user)
            return back()->withErrors([
                "email" => "Nu exista niciun utilizator cu acest email"
            ]);
        $status = Password::sendResetLink([
            "email" => $user->email
        ]);

        return $status = Password::PASSWORD_RESET ?
            back()->with("status", __($status)) :
            back()->withErrors([
                "email" => __($status)
            ]);
    }

    public function resetPasswordChange(Request $request) {
        $data = $request->validate([
            "email" => "required|email",
            "password" => "required|min:8|max:255|confirmed",
            "token" => "required"
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    public function resetPassword(Request $request) {
        return view("users.resetPassword", [
            "token" => $request->get("token"),
            "email" => $request->get("email")
        ]);
    }
}
