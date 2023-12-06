<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, User $model): bool
    {
        return true;
    }

    public function create(?User $user): bool
    {
        return true;
    }

    public function update(User $user, User $model): bool
    {
        return $user->id === $model->id || $user->role === "admin";
    }

    public function delete(User $user, User $model): bool
    {
        return $user->role === "admin";
    }

    public function restore(User $user, User $model): bool
    {
        return $user->role === "admin";
    }

    public function forceDelete(User $user, User $model): bool
    {
        return $user->role === "admin";
    }

    public function activities(User $user): bool {
        dd("test");
        return $user->role === "user";
    }
}
