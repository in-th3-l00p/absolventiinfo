<?php

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

Route::resource("announcements", AnnouncementController::class);
Route::post(
    "/announcements/{announcement}/upload",
    [AnnouncementController::class, "upload"]
)->name("announcements.upload");
Route::resource("users", UserController::class);

Route::prefix("admin")->middleware("admin")->group(function () {
    Route::get("announcements", [AdminController::class, "announcements"])->name("admin.announcements");
    Route::get("activities", [AdminController::class, "activities"])->name("admin.activities");
});
