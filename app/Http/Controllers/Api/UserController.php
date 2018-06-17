<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
//use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{

    /**
     * @var UserRepository
     */
    private $user;

    /**
     * UserController constructor.
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    /**
     * Change menubar setting and save to Redis
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function menubarToggle()
    {
        $user_id = auth()->id();

        $value = Redis::hmget("user.{$user_id}.options", 'menubar');
        Redis::hmset("user.{$user_id}.options", 'menubar', $value ? $value[0] ^ 1 : 1);

        return response()->json(['success' => true], 200);
    }

    /**
     * Handle a request to change profile image
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeAvatar(Request $request)
    {
        $avatar = $this->user->changeAvatar($request);

        return response()->json(['success' => true, 'avatar' => $avatar], 200);
    }

    /**
     * Search and return users from request query
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function search()
    {
        return response()->json(['users' => $this->user->whenQuery()], 200);
    }

}