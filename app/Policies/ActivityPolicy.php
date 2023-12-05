<?php

namespace App\Policies;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ActivityPolicy
{
    public function viewAny(?User $user): bool {
        return true;
    }

    public function view(?User $user, Activity $activity): bool {
        return true;
    }

    public function create(User $user): bool {
        return $user->role === "admin";
    }

    public function update(User $user, Activity $activity): bool {
        return $user->role === "admin";
    }

    public function delete(User $user, Activity $activity): bool {
        return $user->role === "admin";
    }

    public function restore(User $user, Activity $activity): bool {
        return $user->role === "admin";
    }

    public function forceDelete(User $user, Activity $activity): bool {
        return $user->role === "admin";
    }

    public function upload(User $user, Activity $activity): bool {
        return $user->role === "admin";
    }

    public function join(User $user, Activity $activity): bool {
        $joined = $activity->users()->get()
            ->where("id", "=", $user->id)
            ->count() !== 0;
        $accepted = $activity
            ->users()
            ->wherePivot("accepted", "=", 1)
            ->get()
            ->where("id", "=", $user->id)
            ->count() !== 0;

        return
            $user->role === "user" &&
            $activity->can_join &&
            (!$joined || !$accepted);
    }

    public function accept(
        User $user,
        Activity $activity,
        User $participant
    ): bool {
        return
            $user->role === "admin" &&
            $activity->users->contains($participant);
    }

    public function participants(User $user, Activity $activity): bool {
        return $user->role === "admin";
    }
}
