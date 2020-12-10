<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function changeActive($id)
    {
        $account = Account::where('id', $id)->first();
        if ($account->active) {
            $account->active = false;
            $account->user->current_users--;
            $account->user->save();
        } else {
            $account->active = true;
            $account->user->current_users++;
            $account->user->save();
        }
        $account->save();

        return redirect()->back();
    }

    public function page()
    {
        return view('add_user');
    }

    public function add(Request $request)
    {
        $account = new Account();
        $account->ifsc = $request->input('ifsc');
        $account->account_number = $request->input('number');
        $account->name = $request->input('name');
        $account->user_id = auth()->user()->id;
        auth()->user()->current_users++;

        auth()->user()->save();
        $account->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        Account::where('id', $id)->delete();
        return redirect()->back();
    }

    public function edit(Request $request, $id)
    {
        $account = Account::where('id', $id)->first();
        if ($request->input('number')) {
            $account->account_number = $request->input('number');
        }
        if ($request->input('ifsc')) {
            $account->ifsc = $request->input('ifsc');
        }
        if ($request->input('name')) {
            $account->name = $request->input('name');
        }
        $account->save();

        return redirect()->back();
    }

    public function editPage($id)
    {
        return view('edit_user', compact('id'));
    }
}
