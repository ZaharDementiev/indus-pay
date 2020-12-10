<?php

namespace App\Http\Controllers;

use App\Events\NewSuccessfulPayment;
use App\Payment;
use App\UserRequest;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payments()
    {
        $status = UserRequest::WAITING;
        return view('payments', compact('status'));
    }

    public function paymentsAccepted()
    {
        $status = UserRequest::ACCEPTED;
        return view('payments', compact('status'));
    }

    public function paymentsDenied()
    {
        $status = UserRequest::DENIED;
        return view('payments', compact('status'));
    }

    public function editPage($id)
    {
        return view('payments_edit', compact('id'));
    }

    public function edit(Request $request, $id)
    {
        $payments = Payment::where('id', $id)->first();
        $payments->status = $request->input('status');
        $payments->save();

        if ($request->input('status') != Payment::WAITING && $payments->status == Payment::WAITING) {
            broadcast(new NewSuccessfulPayment($payments, true));
        }

        return redirect()->back();
    }
}
