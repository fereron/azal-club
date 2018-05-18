<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
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

    public function changeAvatar(Request $request)
    {
        $avatar = $this->user->changeAvatar($request);

        if (!is_null($avatar)) {
            return response()->json(['success' => true, 'avatar' => $avatar], 200);
        } else {
            return response()->json(['error' => true], 200);
        }
    }

}