<?php

namespace App\Policies;

use App\Models\Announcement;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AnnouncementPolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Announcement $announcement): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->role === "admin";
    }

    public function update(User $user, Announcement $announcement): bool
    {
        return $user->role === "admin";
    }

    public function delete(User $user, Announcement $announcement): bool
    {
        return $user->role === "admin";
    }

    public function restore(User $user, Announcement $announcement): bool
    {
        return $user->role === "admin";
    }

    public function forceDelete(User $user, Announcement $announcement): bool
    {
        return $user->role === "admin";
    }

    public function upload(User $user, Announcement $announcement) {
        return $user->role === "admin";
    }
}
