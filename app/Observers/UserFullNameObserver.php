<?php

namespace App\Observers;

use App\User;

class UserFullNameObserver
{

    public function saving(User $user)
    {
        $user->full_name = $user->first_name . ' ' . $user->last_name;
    }

}