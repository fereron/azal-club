<?php

namespace App\Http\Controllers;

use App\Repositories\GroupPostRepository as Post;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

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


    /**
     * Store post comment
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'body' => 'required',
            'group_id' => 'integer|exists:groups,id',
            'post_id' => 'integer|exists:group_posts,id',
        ]);

        if (!$request->user()->isMember($request->input('group_id'))) {
            throw new AccessDeniedHttpException('You don\'t have access to do this action');
        }

        $comment = $this->post->addComment($request->except('_token'));
        $comment->date = $comment->created_at->diffForHumans();

        return response()->json(['comment' => $comment, 'user' => auth()->user()], 200);
    }

}