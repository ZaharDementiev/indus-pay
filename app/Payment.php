<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public const WAITING = 0;
    public const ACCEPTED = 1;
    public const DENIED = 2;

    public const REQUESTS_ON_PAGE = 20;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
