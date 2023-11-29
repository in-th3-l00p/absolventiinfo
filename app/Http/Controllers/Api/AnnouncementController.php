<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function update(Request $request, Announcement $announcement)
    {
        $announcement->update($request->validate([
            "content" => "required"
        ]));
    }
}
