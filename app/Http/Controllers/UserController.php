<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('pass'));
        $user->active = true;
        $user->current_users = 0;
        $user->save();

        Auth::login($user);
        return redirect()->route('profile');
    }

    public function login(Request $request)
    {
        if (User::where('email', $request->input('email'))->exists()) {
            $user = User::where('email', $request->input('email'))->first();
            dd(Hash::check('password', $user->password));
        }
    }

    public function changeActive($id)
    {
        $user = User::where('id', $id)->first();
        if ($user->active) {
            $user->active = false;
        } else {
            $user->active = true;
        }
        $user->save();

        return redirect()->back();
    }
}
