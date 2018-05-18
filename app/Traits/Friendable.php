<?php

namespace App\Traits;

use App\Friendship;

trait Friendable {
    //Status: Pending => 0,  Accepted => 1,  Declined => 2, Blocked => 3


    /**
     * @param $id
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public function sendFriendRequest($id)
    {
        return Friendship::create([
            'user_one' => min($this->id, $id),
            'user_two' => max($this->id, $id),
            'status' => 0,
            'action_user_id' => $this->id
        ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getFriendRequests()
    {
        return Friendship::query()
                ->with('actionUser')
                ->where('action_user_id', '!=', $this->id)
                ->where('status', 0)
                ->where('user_one', $this->id)
                ->orWhere('user_two', $this->id)
                ->get();
    }

    public function checkFriendshipStatus($friend_id)
    {
        $friendship = Friendship::query()
            ->select(['status'])
            ->where('user_one', min($this->id, $friend_id))
            ->where('user_two', max($this->id, $friend_id))
            ->first();

        return $friendship ? $friendship->status : null;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getFriends()
    {
        return Friendship::query()
            ->where('user_one', $this->id)
            ->orWhere('user_two', $this->id)
            ->get();
    }

    /**
     * @param $action_user_id
     * @return bool
     */
    public function acceptFriendRequest($action_user_id)
    {
        $friendship = Friendship::query()
            ->where('user_one', min($this->id, $action_user_id))
            ->where('user_two', max($this->id, $action_user_id))
            ->where('action_user_id', $action_user_id)
            ->where('status', '=', 0)
            ->first();

        if ($friendship) {
            $friendship->status = 1;
            $friendship->save();

            return true;
        }
        return false;
    }

}