<?php

namespace App\Repositories;

use App\Friendship;

class FriendshipRepository extends Repository
{

    /**
     * @return mixed
     */
    function model()
    {
        return Friendship::class;
    }
}