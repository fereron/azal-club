<?php

namespace App\Repositories;

use App\Group;
use Illuminate\Http\Request;
use Storage;

class GroupRepository extends Repository
{

    /**
     * @return mixed
     */
    function model()
    {
        return Group::class;
    }

    public function createGroup(Request $request)
    {
        $group = $this->model->create($request->all());
        $group->members()->attach(\Auth::id());

        return $group;
    }

    public function deleteGroup($id)
    {
        $group = $this->model->find($id);
        $group->members()->detach();
        $group->delete();

        return true;
    }

    /**
     * @param Request $request
     * @return bool|\Illuminate\Http\JsonResponse
     */
    public function changeAvatar(Request $request)
    {
        $user = $request->user();

        $doc = explode(',', $request->get('image'));
        $format = str_replace(
            [
                'data:image/',
                ';',
                'base64',
            ],
            [
                '', '', '',
            ],
            $doc[0]
        );

        $fileName = time() . md5($user->email) . '.' . $format;
        $doc = base64_decode($doc[1]);
        $bytes_written = Storage::disk('public')->put("avatars/$fileName", $doc);

        if ($bytes_written === false) {
            return null;
        }

        if ($user->avatar && $user->avatar !== 'no-user.gif') {
            Storage::disk('public')->delete("avatars/{$user->avatar}");
        }

        $user->avatar = $fileName;
        $user->save();

        return $fileName;
    }


    /**
     * @param Request $request
     * @return bool
     */
    public function updateProfile(Request $request)
    {
        $user = $request->user();

        $user->fill($request->all());
        $user->profile->fill($request->all());

        $user->save();
        $user->profile->save();

        return true;
    }

    public function search()
    {
        return $this->model
            ->when(request('q'), function ($query) {
                $query->where('name', 'like', '%' . request('q') . '%');
            })->get();
    }

    public function searchFromRequest($query)
    {
        return $this->model
            ->when($query, function ($group) use ($query) {
                $group->where('name', 'like', '%' . $query . '%');
            })->limit(10)->get();
    }

    public function addPost(Request $request)
    {
        $group = $this->model->find($request->input('group_id'));

        return $group->posts()->create([
            'body' => $request->input('body'),
            'user_id' => auth()->id()
        ]);
    }

    public function updateGroup($id, Request $request)
    {
        $group = $this->model->find($id);
        $group->fill($request->only('name', 'privacy', 'description'));

        if ($request->hasFile('avatar')) {
            $photo = $request->file('avatar');
            $fileName = time() . md5($group->id) . '.' . $photo->extension();

            if ($group->avatar !== 'placeholder.png') {
                Storage::disk('public')->delete("groups/avatars/{$group->avatar}");
            }

            $photo->storeAs('groups/avatars', $fileName, 'public');
            $group->avatar = $fileName;
        }

        $group->save();

        return true;
    }

}