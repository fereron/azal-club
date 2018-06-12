<?php

namespace App\Observers;

use App\Group;

class GroupAvatarObserver {

    public function creating(Group $group)
    {
        if (!$group->avatar) {
            $group->avatar = 'placeholder.png';
        }
        return true;
    }

}