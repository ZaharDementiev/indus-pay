<?php

namespace App\Http\Controllers;

use App\Events\NewDataToPay;
use App\User;
use App\UserRequest;
use Illuminate\Http\Request;

class UserRequestController extends Controller
{
    public function page($id)
    {
        return view('request_edit', compact('id'));
    }

    public function edit(Request $request, $id)
    {
        $userRequest = UserRequest::where('id', $id)->first();

        if ($request->input('status') == UserRequest::WAITING && $userRequest->status != UserRequest::WAITING) {
            $user = User::where('id', $userRequest->user_id)->first();
            $user->requests++;
            $user->save();
        } elseif ($request->input('status') != UserRequest::WAITING && $userRequest->status == UserRequest::WAITING) {
            $user = User::where('id', $userRequest->user_id)->first();
            $user->requests--;
            $user->save();

            broadcast(new NewDataToPay($userRequest->getAccount()));
        }

        $userRequest->status = $request->input('status');
        $userRequest->save();

        return redirect()->back();
    }
}
