<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'position', 'email', 'avatar', 'password', 'full_name', 'gender', 'uuid'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'id'
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class)
            ->withPivot('role')
            ->withTimestamps();
    }

    public function getAvatarPathAttribute()
    {
        return '/storage/users/avatars/'.$this->attributes['avatar'];
    }

    public function getCoverAttribute()
    {
        return '/storage/users/covers/'.$this->attributes['cover'];
    }

    /**
     * Check if the user is admin of group
     *
     * @param $group_id
     * @return bool
     */
    public function isAdmin($group_id)
    {
        $group = $this->groups()->find($group_id);
        if (is_null($group)) return false;

        return ($group->pivot->role == 'admin') ? true : false;
    }

    /**
     * Check if the user is admin of group
     *
     * @param $group_id
     * @return bool
     */
    public function isMember($group_id)
    {
        $group = $this->groups()->find($group_id);
        if (is_null($group)) return false;

        return ($group->pivot->role == 'admin') ? true : false;
    }

    public function requestToGroup()
    {
        return $this->hasMany(GroupRequest::class);
    }
}
