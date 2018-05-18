<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository as User;
use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * @var User
     */
    private $user;

    /**
     * ProfileController constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }


    public function index()
    {
        return view('dashboard.profile', [
            'user' => Auth::user()
        ]);
    }

    public function settings()
    {
        return view('dashboard.settings', [
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'position' => 'required|string|max:100',
        ]);

        $this->user->updateProfile($request);

        return back()->with('updated', true);
    }


}