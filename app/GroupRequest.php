<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupRequest extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
