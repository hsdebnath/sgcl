<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\user;
use App\company;
use App\bank;
use App\account;
use App\Order;
use App\sales;
use App\purchase;
use App\expanse;
use App\fund;
use App\inventory;
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
    {   //get inventory valuation
        $inventory = DB::SELECT('SELECT sum(quantity*rate) as value FROM inventories WHERE 1');
        $inventory =  $inventory[0]->value;
        //Get recent funds
        $funds = fund::orderBy('id','desc')->take(5)->get();
        //get recent expanse
        $expanses = expanse::orderBy('id','desc')->take(5)->get();
        //get latest purchase
        $purchase = purchase::orderBy('id','desc')->take(5)->get();
        //get latest sales
        $sales = sales::orderBy('id','desc')->take(5)->get();
        //get bank balance
        $company = Auth::user()->company_id;
        $banks = bank::where('companies_id', $company)->get();
        //get active orders
        $orders = Order::orderBy('id','Desc')->take('2')->get();
        // get last balance of all companies
        $data = DB::select('select t.company_id,(select name from companies where id = t.company_id) name, t.balance
        from accounts t
        inner join (
            select company_id, max(created_at) as MaxDate
            from accounts
            group by company_id
        ) tm on t.company_id = tm.company_id and t.created_at = tm.MaxDate where t.company_id != '.$company);

        return view('pages.dash')->with(compact('data','orders','banks', 'sales', 'purchase', 'expanses', 'funds', 'inventory'));
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