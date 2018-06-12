<?php

namespace App\Http\Controllers;

use App\Repositories\GroupRepository as Group;
use App\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class GroupUserController extends Controller
{
    /**
     * @var Group
     */
    private $group;

    /**
     * GroupUserController constructor.
     * @param Group $group
     */
    public function __construct(Group $group)
    {
        $this->group = $group;
    }

    public function store(Request $request)
    {
        $group = $this->group->find($request->input('group_id'));
        $user_id = auth()->id();

        if ($group->isPrivate()) {
            $group->requests()->create([
               'user_id' => $user_id
            ]);

            return back()->with('request_pending', true);
        } else {
            $request->user()->groups()->attach($request->input('group_id'));

            return back()->with('added', true);
        }
    }

    public function accept(Request $request)
    {
        if (!$request->user()->isAdmin($request->input('group_id'))) {
            throw new AccessDeniedHttpException('You haven\'t access to this action');
        }

        $user = User::find($request->input('user_id'));
        $group = $this->group->find($request->input('group_id'));
        $group->members()->attach($request->input('user_id'));

        $request = $group->requests()->where('user_id', $request->input('user_id'))->first();
        $request->delete();

        return back()->with('success', "Пользователь {$user->full_name} успешно добавлен в группу");
    }

}