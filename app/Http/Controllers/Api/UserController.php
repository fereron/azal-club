<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
//use App\User;
use Illuminate\Http\Request;

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

    public function menubarToggle(Request $request)
    {
        $user = $request->user();
        $options = $user->profile->options;

        if (isset($options['menubar'])) {
            $options['menubar'] = !$options['menubar'];
        } else {
            $options['menubar'] = false;
        }

        $user->profile->options = $options;
        $user->profile->save();

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