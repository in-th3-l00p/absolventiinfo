<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityRequest;
use App\Models\Activity;
use App\Models\Announcement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{
    public function __construct() {
        $this->authorizeResource(Activity::class);
    }

    public function index() {
        return view("activities.index", [
            "activities" => Activity::query()
                ->where("visibility", "=", "public")
                ->latest()
                ->paginate(5)
        ]);
    }

    public function create() {
        return view("activities.create");
    }

    public function store(ActivityRequest $request) {
        if ($request->can_join) {
            if ($request->max_joins === null)
                return back()->withErrors([
                    "max_joins" => "Numarul maxim de participanti este necesar"
                ]);
            if ($request->join_expire === null)
                return back()->withErrors([
                    "join_expire" => "Data de inchidere al inscrieri este necesara"
                ]);
        }

        $activity = Activity::create([
            ...$request->validated(),
            "can_join" => $request->can_join ? true : false,
            "content" => "",
            "user_id" => $request->user()->id,
        ]);
        return redirect()
            ->route("activities.edit", [ "activity" => $activity ]);
    }

    public function upload(Request $request, Activity $activity) {
        $this->authorize("upload", $activity);
        $path = Storage::disk("public")->put(
            "/activities/" . $activity->id,
            $request->file("upload")
        );

        return [
            "url" => "/storage/" . $path
        ];
    }

    public function join(Activity $activity) {
        $this->authorize("join", $activity);
        if ($activity
                ->users()
                ->get()
                ->where("id", "=", Auth::user()->id)
                ->count() !== 0
        ) {
            $activity->users()->detach(Auth::user());
            return redirect()->back();
        }
        $activity->users()->attach(Auth::user()->id, [
            "accepted" => false,
            "created_at" => now()
        ]);
        return redirect()->back();
    }

    public function show(Activity $activity) {
        $joined = [ "joined" => false, "accepted" => false ];
        if (Auth::check())
            $joined = $activity->isJoined(Auth::user());
        return view("activities.show", [
            "activity" => $activity,
            "user" => $activity->user()->first(),
            "joined" => $joined["joined"],
            "accepted" => $joined["accepted"]
        ]);
    }

    public function edit(Activity $activity) {
        return view("activities.edit", [
            "activity" => $activity
        ]);
    }

    public function editContent(Activity $activity) {
        $this->authorize("update", $activity);
        return view("activities.editContent", [
            "activity" => $activity
        ]);
    }

    public function update(ActivityRequest $request, Activity $activity) {
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
            ...$request->validated(),
            "can_join" => $request->can_join ? true : false
        ]);

        return redirect()->route("activities.edit", [
            "activity" => $activity
        ]);
    }

    public function destroy(Activity $activity) {
        //
    }

    public function participants(Activity $activity) {
        $this->authorize("participants", $activity);
        return view("activities.participants", [
            "activity" => $activity,
            "users" => $activity
                ->users()
                ->withPivot("accepted")
                ->paginate(10)
        ]);
    }

    public function accept(Activity $activity, User $user) {
        $this->authorize("accept", [ $activity, $user ]);
        $activity
            ->users()
            ->updateExistingPivot($user->id, [
                "accepted" => true
            ]);
        return redirect()->back();
    }

    public function reject(Activity $activity, User $user) {
        $this->authorize("accept", [ $activity, $user ]);
        $activity->users()->detach($user->id);
        return redirect()->back();
    }
}
