<?php

namespace App\Observers;

use App\User;

class UserAvatarObserver {

    public function creating(User $user)
    {
        if (!$user->avatar) {
            $user->avatar = 'no-user.gif';
        }

        $user->uuid = uuid();
        $user->cover = 'placeholder.png';

        return true;
    }

}