<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function members()
    {
        return $this->belongsToMany('App\Models\Member');
    }
}
