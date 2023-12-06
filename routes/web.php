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

Route::prefix("admin")->middleware("admin")->group(function () {
    Route::get("announcements", [AdminController::class, "announcements"])
        ->name("admin.announcements");
    Route::get("activities", [AdminController::class, "activities"])
        ->name("admin.activities");

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
});
