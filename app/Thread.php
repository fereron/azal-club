<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $guarded = [];

    public function author()
    {
        return $this->belongsTo(User::class);
    }
}
