<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\account;
use DB;

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
        // get last balance of all companies
        $data = DB::select('select t.company_id,(select name from companies where id = t.company_id) name, t.balance
        from accounts t
        inner join (
            select company_id, max(updated_at) as MaxDate
            from accounts
            group by company_id
        ) tm on t.company_id = tm.company_id and t.updated_at = tm.MaxDate');

        return view('pages.report')->with('data',$data);

    }

    public function users()
    {
        $users = user::all();
        return view('pages.users')->with('users',$users);
    }
    
}

// // get last balance of all companies
// $data = DB::select('select t.company_id, t.balance
//         from accounts t
//         inner join (
//             select company_id, max(updated_at) as MaxDate
//             from accounts
//             group by company_id
//         ) tm on t.company_id = tm.company_id and t.updated_at = tm.MaxDate');