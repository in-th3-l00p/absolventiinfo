<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function announcements() {
        return view("admin.announcements", [
            "announcements" => Announcement::query()->latest()->paginate(5)
        ]);
    }

    public function activities() {
        return view("admin.activities", [
            "activities" => Activity::query()->latest()->paginate(5)
        ]);
    }

//    public function users() {
//        return view("admin.users");
//    }
}
