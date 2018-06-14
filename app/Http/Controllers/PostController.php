<?php

namespace App\Http\Controllers;

use App\Repositories\GroupPostRepository as Post;
use App\Repositories\GroupRepository as Group;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class PostController extends Controller
{

    private $post;

    private $group;

    /**
     * PostController constructor.
     * @param Post $post
     * @param Group $group
     */
    public function __construct(Post $post, Group $group)
    {
        $this->post = $post;
        $this->group = $group;
    }

    /**
     * Store group post to DB
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        if (!$request->user()->isMember($request->input('group_id'))) {
            throw new AccessDeniedHttpException('You don\'t have access to do this action');
        }

        $this->validate($request,[
            'body' => 'required',
            'group_id' => 'integer'
        ]);

        $post = $this->group->addPost($request);
        $post->date = $post->created_at->diffForHumans();

        return response()->json(['post' => $post, 'user' => auth()->user()], 200);
    }

}