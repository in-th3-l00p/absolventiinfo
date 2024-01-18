<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Activity extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "title", "content", "visibility",
        "start", "end",
        "can_join", "max_joins", "join_expire",
        "user_id", "thumbnail"
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function users() {
        return $this->belongsToMany(
            User::class,
            "user_activity",
            "activity_id",
            "user_id"
        );
    }

    // return the first paragraph of the content
    public function getDescription() {
        $start = strpos($this->content, "<p>");
        $end = strpos($this->content, "</p>");

        return substr($this->content, $start + 3, $end - $start - 3);
    }

    public function isJoined(User $user): array {
        $query = $this
            ->users()
            ->withPivot("accepted")
            ->get()
            ->where("id", "=", $user->id);
        $joined = $query->count() !== 0;
        $accepted = false;
        if ($joined)
            $accepted = $query->first()->pivot->accepted;
        return [
            "joined" => $joined,
            "accepted" => $accepted
        ];
    }

    public function getAcceptedCount() {
        return $this->users()
            ->wherePivot("accepted", "=", 1)
            ->count();
    }
}
