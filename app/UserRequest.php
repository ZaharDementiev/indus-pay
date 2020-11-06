<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRequest extends Model
{
    public const WAITING = 0;
    public const ACCEPTED = 1;
    public const DENIED = 2;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
