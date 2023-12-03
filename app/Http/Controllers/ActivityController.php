<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{
    public function index() {
        return view("activities.index", [
            "activities" => Activity::query()
                ->where("visibility", "=", "public")
                ->latest()
                ->paginate(5)
        ]);
    }

    public function create()
    {
        return view("activities.create");
    }

    public function store(Request $request)
    {
        $data = $request->validate(
                [
                    "title" => "required|min:1|max:50|unique:announcements,title",
                    "start" => "required|date",
                    "end" => "required|date",
                    "max_joins" => "nullable|numeric",
                    "join_expire" => "nullable|date"
                ],
                [
                    "title.required" => "Titlul este necesar",
                    "title.max" => "Titlul trebuie sa aiba maxim 50 de caractere",
                    "title.unique" => "Titlul este deja folosit",
                    "start.required" => "Data de inceput este necesara",
                    "end.required" => "Data de terminare este necesara"
                ]
        );

        if ($request->can_join) {
            if ($data["max_joins"] === null)
                return back()->withErrors([
                    "max_joins" => "Numarul maxim de participanti este necesar"
                ]);
            if ($data["join_expire"] === null)
                return back()->withErrors([
                    "join_expire" => "Data de inchidere al inscrieri este necesara"
                ]);
        }

        $activity = Activity::create([
            ...$data,
            "can_join" => $request->can_join ? true : false,
            "content" => "",
            "user_id" => $request->user()->id,
        ]);
        return redirect()
            ->route("activities.edit", [ "activity" => $activity ]);
    }

    public function upload(Request $request, Activity $activity) {
        $path = Storage::disk("public")->put(
            "/activities/" . $activity->id,
            $request->file("upload")
        );

        return [
            "url" => "/storage/" . $path
        ];
    }

    public function show(Activity $activity) {
        return view("activities.show", [
            "activity" => $activity,
            "user" => $activity->user()->first()
        ]);
    }

    public function edit(Activity $activity) {
        return view("activities.edit", [
            "activity" => $activity
        ]);
    }

    public function editContent(Activity $activity) {
        return view("activities.editContent", [
            "activity" => $activity
        ]);
    }

    public function update(Request $request, Activity $activity)
    {
        $data = $request->validate(
            [
                "title" => "required|min:1|max:50|unique:announcements,title",
                "start" => "required|date",
                "end" => "required|date",
                "visibility" => "required|in:public,private",
                "max_joins" => "nullable|numeric",
                "join_expire" => "nullable|date",
            ],
            [
                "title.required" => "Titlul este necesar",
                "title.max" => "Titlul trebuie sa aiba maxim 50 de caractere",
                "title.unique" => "Titlul este deja folosit",
                "start.required" => "Data de inceput este necesara",
                "end.required" => "Data de terminare este necesara"
            ]
        );

        if ($request->can_join) {
            if ($data["max_joins"] === null)
                return back()->withErrors([
                    "max_joins" => "Numarul maxim de participanti este necesar"
                ]);
            if ($data["join_expire"] === null)
                return back()->withErrors([
                    "join_expire" => "Data de inchidere al inscrieri este necesara"
                ]);
        }

        $activity->update([
            ...$data,
            "can_join" => $request->can_join ? true : false
        ]);

        return redirect()->route("activities.edit", [
            "activity" => $activity
        ]);
    }

    public function destroy(Activity $activity)
    {
        //
    }
}
