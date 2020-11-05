<?php

namespace App\Http\Controllers;

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
        //$this->middleware('auth');
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
        return view('requests');
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
