<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{

    public function update(Request $request, Activity $activity)
    {
        $activity->update($request->validate([
            "content" => "required"
        ]));
    }
}
