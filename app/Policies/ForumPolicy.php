<?php

namespace App\Policies;

use App\Models\Forum;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ForumPolicy
{
    use HandlesAuthorization;


    public function create(User $user)
    {
        return true;
    }


    public function update(User $user, Forum $forum)
    {
        return $user->id == $forum->user->id;
    }

    public function delete(User $user, Forum $forum)
    {
        return $user->id == $forum->user->id;
    }

}
