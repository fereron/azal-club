<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use App\Thread;

class ThreadsController extends Controller
{

    public function index()
    {
        $threads = Thread::with('author')->latest()->get();

        return view('forum.index', compact('threads'));
    }

}