<?php

use App\Http\Controllers\Api\ActivityController;
use App\Http\Controllers\Api\AnnouncementController;
use Illuminate\Support\Facades\Route;

// todo: security
Route::apiResource("announcements", AnnouncementController::class)->only(["update"])
    ->name("update", "api.announcements.update");

Route::apiResource("activities", ActivityController::class)->only(["update"])
    ->name("update", "api.activities.update");
