<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AnnouncementController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Announcement::class);
    }

    public function index()
    {
        return view("announcements.index", [
            "announcements" => Announcement::query()
                ->where("visibility", "=", "public")
                ->latest()
                ->paginate()
        ]);
    }

    public function create()
    {
        return view("announcements.create");
    }

    public function store(Request $request)
    {
        $announcement = Announcement::create([
            ...$request->validate([ "title" => "required|min:1|max:50|unique:announcements,title" ]),
            "content" => "",
            "user_id" => Auth::user()->id
        ]);

        return redirect()->route("announcements.edit", [
            "announcement" => $announcement
        ]);
    }

    public function attachFile(Request $request, Announcement $announcement) {
        $path = Storage::disk("public")->put(
            "/announcements/" . $announcement->id,
            $request->file()
        );

        var_dump($path);
        return [
            "url" => $path
        ];
    }

    public function show(Announcement $announcement)
    {
        return view("announcements.show", [
            "announcement" => $announcement,
            "user" => $announcement->user()->first()
        ]);
    }

    public function edit(Announcement $announcement)
    {
        return view("announcements.edit", [
            "announcement" => $announcement
        ]);
    }

    public function update(Request $request, Announcement $announcement)
    {
        if ($request->title === $announcement->title) {
            $announcement->update($request->validate([
                "visibility" => "required|in:public,private"
            ]));
        } else {
            $announcement->update($request->validate([
                "title" => "required|min:1|max:50|unique:announcements,title"
            ]));
        }

        return redirect()->route("announcements.edit", [
            "announcement" => $announcement
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        //
    }
}
