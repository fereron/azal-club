<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\GroupRepository as Group;
use App\Repositories\UserRepository as User;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * @var User
     */
    private $user;

    /**
     * @var Group
     */
    private $group;

    /**
     * GroupController constructor.
     *
     * @param User $user
     * @param Group $group
     */
    public function __construct(User $user, Group $group)
    {
        $this->user = $user;
        $this->group = $group;
    }

    public function search()
    {
        return response()->json(['groups' => $this->group->search()], 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addMember(Request $request)
    {
        $user = $this->user->findBy('full_name', $request->input('query'));

        if ($user) {

            if ($user->groups()->where(['group_id'=>$request->input('group_id')])->exists()) {
                return response()->json(['attached' => true], 200);
            }

            $user->groups()->attach(['group_id'=>$request->input('group_id')]);

            return response()->json(['added' => true], 200);
        }

        $validator = \Validator::make($request->all(), [
           'query' => 'string|email|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => true, 'message' => 'Введите эл. адрес в правильном формате.'], 200);
        }

        //TODO send invitation to mail


        dd('invitation');
    }

}