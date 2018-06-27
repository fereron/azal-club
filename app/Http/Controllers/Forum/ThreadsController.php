<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use App\Repositories\ThreadsRepository;
use App\Thread;
use Illuminate\Http\Request;

class ThreadsController extends Controller
{
    /**
     * @var ThreadsRepository
     */
    private $threads;

    /**
     * ThreadsController constructor.
     * @param ThreadsRepository $threads
     */
    public function __construct(ThreadsRepository $threads)
    {
        $this->threads = $threads;
    }

    /**
     * Show all threads
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $threads = $this->threads->getLatest();

        return view('forum.index', compact('threads'));
    }

    /**
     * Show single thread
     *
     * @param Thread $thread
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Thread $thread)
    {
        return view('forum.show', compact('thread'));
    }

    /**
     * Store thread to DB
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'title' => 'required|string|max:255',
           'body' => 'required',
        ]);

        $thread = $this->threads->create($request->except('_token'));

        return redirect()->route('thread', $thread->id);
    }

}