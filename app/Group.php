<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
      'name', 'avatar', 'description', 'privacy'
    ];

    public function members()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('role')
            ->withTimestamps();
    }

    public function posts()
    {
        return $this->hasMany(GroupPost::class)->orderByDesc('created_at');
    }

    public function requests()
    {
        return $this->hasMany(GroupRequest::class);
    }

    public function getAvatarPathAttribute()
    {
        return '/storage/groups/avatars/'.$this->attributes['avatar'];
    }

    public function getUserAttribute()
    {
        $user = $this->members()->where('id', \Auth::id())->first();

        if ($user) {
            return $user->pivot;
        }
        return null;
    }

    public function getPreloaderMembersAttribute()
    {
        return $this->members()->take(6)->get()->reject(function ($member) { return $member->id == \Auth::id();});
    }

    public function isPrivate()
    {
        return ($this->privacy == 1) ? true : false;
    }

}
