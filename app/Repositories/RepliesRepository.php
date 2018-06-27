<?php

namespace App\Repositories;

use App\Reply;

class RepliesRepository extends Repository
{

    /**
     * @return mixed
     */
    function model()
    {
        return Reply::class;
    }


}