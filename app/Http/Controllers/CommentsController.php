<?php

namespace App\Http\Controllers;

use App\Repositories\GroupPostRepository as Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    private $post;

    /**
     * PostController constructor.
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'body' => 'required',
            'post_id' => 'integer'
        ]);

        $comment = $this->post->addComment($request->except('_token'));
        $comment->date = $comment->created_at->diffForHumans();

        return response()->json(['comment' => $comment, 'user' => auth()->user()], 200);
    }

}