<?php

namespace App\Http\Controllers;

use App\Repositories\GroupPostRepository as Post;
use App\Repositories\GroupRepository as Group;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $this->validate($request,[
            'body' => 'required',
            'group_id' => 'integer'
        ]);

        $post = $this->group->addPost($request);
        $post->date = $post->created_at->diffForHumans();

        return response()->json(['post' => $post, 'user' => auth()->user()], 200);
    }

}