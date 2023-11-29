<?php

use App\Http\Controllers\Api\AnnouncementController;
use Illuminate\Support\Facades\Route;

// todo: security
Route::apiResource("announcements", AnnouncementController::class)->only(["update"])
    ->name("update", "api.announcements.update");


Route::get("/", function () {
    return (new \App\Http\Resources\Test(null));
});
