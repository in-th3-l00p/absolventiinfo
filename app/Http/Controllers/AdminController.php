<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Announcement;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function announcements() {
        return view("admin.announcements", [
            "announcements" => Announcement::query()->latest()->paginate(7)
        ]);
    }

    public function activities() {
        return view("admin.activities", [
            "activities" => Activity::query()->latest()->paginate(7)
        ]);
    }

    public function users() {
        $users = User::query()->latest();
        if (request()->has("search")) {
            $users = $users
                ->where("first_name", "like", "%" . request("search") . "%")
                ->orWhere("last_name", "like", "%" . request("search") . "%")
                ->orWhere("email", "like", "%" . request("search") . "%");
        }

        return view("admin.users", [
            "users" => $users->paginate(5)
        ]);
    }
}
