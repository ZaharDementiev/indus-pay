<?php

namespace App\Http\Controllers;

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
        $userRequest->status = $request->input('status');
        $userRequest->save();

        return redirect()->back();
    }
}
