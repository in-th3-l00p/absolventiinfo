<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::view("/", "index")->name("index");

Route::view("/login", "auth.login")->name("login");
Route::post("/login", [AuthController::class, "login"])->name("login.submit");
Route::get("/logout", [AuthController::class, "logout"])->name("logout");
Route::view("/register", "auth.register")->name("register");
Route::post("/register", [AuthController::class, "register"])->name("register.submit");

Route::resource("announcements", AnnouncementController::class)
    ->only([ "index", "show" ]);

Route::resource("activities", ActivityController::class)
    ->only([ "index", "show" ]);
Route::post(
    "/activities/{activity}/join",
    [ActivityController::class, "join"]
)->name("activities.join");

Route::get(
    "/users/activities",
    [UserController::class, "activities"]
)->name("users.activities");
Route::resource("users", UserController::class)
    ->only(["show", "edit", "update"]);
Route::get(
    "/users/edit/password",
    [UserController::class, "editPassword"]
)->name("users.edit.password");
Route::put(
    "/users/update/password",
    [UserController::class, "updatePassword"]
)->name("users.update.password");

Route::prefix("admin")->middleware("admin")->group(function () {
    Route::get("announcements", [AdminController::class, "announcements"])
        ->name("admin.announcements");
    Route::get("activities", [AdminController::class, "activities"])
        ->name("admin.activities");
    Route::get("users", [AdminController::class, "users"])
        ->name("admin.users");

    Route::resource("announcements", AnnouncementController::class)
        ->except([ "index", "show" ]);
    Route::post(
        "/announcements/{announcement}/upload",
        [AnnouncementController::class, "upload"]
    )->name("announcements.upload");

    Route::resource("activities", ActivityController::class)
        ->except([ "index", "show" ]);
    Route::get(
        "/activities/{activity}/edit/content",
        [ActivityController::class, "editContent"]
    )->name("activities.edit.content");
    Route::post(
        "/activities/{activity}/upload",
        [ActivityController::class, "upload"]
    )->name("activities.upload");
    Route::get(
        "/activities/{activity}/participants",
        [ActivityController::class, "participants"]
    )->name("activities.participants");
    Route::put(
        "/activities/{activity}/accept/{user}",
        [ActivityController::class, "accept"]
    )->name("activities.accept");
    Route::put(
        "/activities/{activity}/reject/{user}",
        [ActivityController::class, "reject"]
    )->name("activities.reject");
    Route::put(
        "/activities/{activity}/content",
        [ActivityController::class, "updateContent"]
    )->name("activities.update.content");

    Route::get(
        "/activities/invite",
        [ActivityController::class, "invite"]
    )->name("activities.invite");
    Route::post(
        "/activities/invite",
        [ActivityController::class, "inviteSubmit"]
    )->name("activities.invite.submit");

    Route::resource("users", UserController::class)
        ->only("destroy");
    Route::post("/users/upload", [UserController::class, "upload"])
        ->name("users.upload");
});
