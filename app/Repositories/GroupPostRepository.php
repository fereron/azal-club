<?php

namespace App\Repositories;

use App\GroupPost;
use Illuminate\Http\Request;
use Storage;

class GroupPostRepository extends Repository
{

    /**
     * @return mixed
     */
    function model()
    {
        return GroupPost::class;
    }


    public function addComment(array $data)
    {
        return $this->model
            ->find($data['post_id'])
            ->comments()
            ->create([
                'body' => $data['body'],
                'user_id' => auth()->id(),
            ]);
    }

}