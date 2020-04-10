<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;

class PagesController extends Controller
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
        return view('pages.home');
    }

    public function dash()
    {
        return view('pages.dash');
    }

    public function report()
    {
        return view('pages.report');
    }

    public function users()
    {
        $users = user::all();
        return view('pages.users')->with('users',$users);
    }
    
}
