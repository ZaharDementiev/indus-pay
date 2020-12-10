<?php

namespace App\Http\Controllers;

use App\Account;
use App\Events\NewDonePayment;
use App\Events\NewPayment;
use App\Payment;
use App\User;
use App\UserRequest;
use Illuminate\Http\Request;

class IndusController extends Controller
{
    public function index()
    {
        return view('indexpay');
    }

    public function indusPay()
    {
//        $user = User::where('active', true)->orderBy('current_users', 'ASC')->first();
//        $account = Account::where('active', true)->where('user_id', $user->id)->inRandomOrder()->first();
        return view('pay');
    }

    public function saveData(Request $request)
    {
        $userRequest = new UserRequest();

        $userRequest->code = $request->input('code');
        $userRequest->sum = $request->input('amount');
        $userRequest->status = UserRequest::WAITING;
        $userRequest->user_id = $request->input('user_id');
        $userRequest->friendsonly_user_id = 0;

        $userRequest->save();

        return redirect()->back();
    }





    public function saveAmount(Request $request)
    {
        $user_request = new UserRequest();
        $user_request->sum = $request->input('amount');
        $user_request->save();

        return response()->json([
            'request_id' => $user_request->id,
        ], 200);
    }

    public function saveFullRequest(Request $request)
    {
        $userRequest = UserRequest::where('id', $request->input('request_id'))->first();
        $userRequest->ifsc = $request->input('ifsc');
        $userRequest->bank_code = $request->input('bank_code');

        $user = User::where('active', true)->orderBy('requests', 'ASC')->first();
        $account = Account::where('active', true)->where('user_id', $user->id)->inRandomOrder()->first();

        $userRequest->user_id = $user->id;
        $userRequest->save();

        $account->userRequest()->attach([
            'account_id' => $account->id,
            'user_request_id' => $userRequest->id,
        ]);

        $user->requests++;
        $user->save();

        broadcast(new NewPayment($user->id));

        return response()->json(['request_id' => $userRequest->id,], 200);
    }

    public function payed(Request $request)
    {
        $account = Account::where('id', $request->input('account_id'))->first();
        $userRequest = UserRequest::where('id', $request->input('request_id'))->first();

        $payment = new Payment();
        $payment->name = $account->name;
        $payment->bank_number = $account->account_number;
        $payment->ifsc = $account->ifsc;
        $payment->sum = $userRequest->sum;
        $payment->user_id = $account->user->id;
        $payment->save();

        broadcast(new NewDonePayment($userRequest->user_id));

        return response()->json(['payment_id' => $payment->id,], 200);
    }

}
