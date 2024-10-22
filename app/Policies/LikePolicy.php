<?php

namespace App\Policies;

use App\Models\Like;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LikePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, Like $like): bool
    {
        return false;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Like $like): bool
    {
        return false;
    }

    public function delete(User $user, Like $like): bool
    {
        return false;
    }

    public function restore(User $user, Like $like): bool
    {
        return false;
    }

    public function forceDelete(User $user, Like $like): bool
    {
        return false;
    }
}
