<?php

namespace App\Repositories;

use App\Thread;

class ThreadsRepository extends Repository
{

    /**
     * @return mixed
     */
    function model()
    {
        return Thread::class;
    }

    public function getLatest()
    {
        return $this->model
            ->with('author')
            ->latest()
            ->get();
    }

    public function create(array $data)
    {
        return $this->model->create([
            'title' => $data['title'],
            'body' => $data['body'],
            'user_id' => auth()->id()
        ]);
    }


}