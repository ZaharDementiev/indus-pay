<?php

namespace App\Http\Controllers;

use App\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('profile');
    }

    public function profile()
    {
        return view('profile');
    }

    public function accounts()
    {
        return view('users');
    }

    public function requests()
    {
        $status = UserRequest::WAITING;
        return view('requests', compact('status'));
    }

    public function requestsAccepted()
    {
        $status = UserRequest::ACCEPTED;
        return view('requests', compact('status'));
    }

    public function requestsDenied()
    {
        $status = UserRequest::DENIED;
        return view('requests', compact('status'));
    }

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.reg');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
