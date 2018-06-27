<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use App\Repositories\RepliesRepository;
use App\Repositories\ThreadsRepository;
use App\Thread;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    /**
     * @var RepliesRepository
     */
    private $replies;
    /**
     * @var ThreadsRepository
     */
    private $thread;

    /**
     * RepliesController constructor.
     * @param RepliesRepository $replies
     * @param ThreadsRepository $thread
     */
    public function __construct(RepliesRepository $replies, ThreadsRepository $thread)
    {
        $this->replies = $replies;
        $this->thread = $thread;
    }


    /**
     * Save reply to DB
     *
     * @param $thread_id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Thread $thread, Request $request)
    {
        $this->validate($request, [
            'body' => 'required',
        ]);

        $thread->addReply([
            'body' => $request->input('body'),
            'user_id' => auth()->id()
        ]);

        return back();
    }

}