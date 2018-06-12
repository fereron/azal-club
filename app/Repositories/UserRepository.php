<?php

namespace App\Repositories;

use App\User;
use File;
use Illuminate\Http\Request;
use Storage;

class UserRepository extends Repository
{

    /**
     * @return mixed
     */
    function model()
    {
        return User::class;
    }

    /**
     * @return mixed
     */
    public function whenQuery()
    {
        return $this->model
            ->with('profile')
            ->when(request('q'), function ($query) {
                $query->where('first_name', 'like', '%' . request('q') . '%')
                    ->orWhere('last_name', 'like', '%' . request('q') . '%')
                    ->orWhere('full_name', 'like', '%' . request('q') . '%');
            })->get();
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

        if ($request->hasFile('cover')) {
            $photo = $request->file('cover');
            $fileName = time() . md5($user->email) . '.' . $photo->extension();

            if ($user->cover !== 'placeholder.png') {
                Storage::disk('public')->delete("users/covers/{$user->cover}");
            }

            $photo->storeAs('users/covers', $fileName, 'public');
            $user->cover = $fileName;
        }

        $user->save();
        $user->profile->save();

        return true;
    }
}