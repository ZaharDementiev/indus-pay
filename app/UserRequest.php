<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRequest extends Model
{
    public const WAITING = 0;
    public const ACCEPTED = 1;
    public const DENIED = 2;

    public const REQUESTS_ON_PAGE = 20;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function getAccount()
    {
        $accountRequest = AccountRequest::where('user_request_id', $this->id)->first();
        $account = Account::where('id', $accountRequest->account_id)->first();
        return $account;
    }
}
