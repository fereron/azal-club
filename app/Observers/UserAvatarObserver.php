<?php

namespace App\Observers;

use App\User;

class UserAvatarObserver {

    public function creating(User $user)
    {
        if (!$user->avatar) {
            $user->avatar = 'no-user.gif';
//            $user->save();
        }
        return true;
    }

}