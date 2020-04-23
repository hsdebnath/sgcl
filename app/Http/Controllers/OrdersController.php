<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use\App\Order;
use App\sales;
use\App\Company;
use\App\items;
use DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $orders = order::where('status','0')->get();
        $sales = sales::all();
        //$sales = sales::where('created_at','>=',Carbon::now()->subdays(15))->get();
        //return $sales;
        return view('pages.orders.view')->with(compact('sales','orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $my_company =  Auth::user()->company_id;
        $company = company::where('id', '!=', $my_company)->pluck('name', 'id');
        $items = items::pluck('name', 'id');
        return view('pages.orders.create')->with(compact('company', 'items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->input('range')){
        //$last_30_days = User::where('created_at','>=',Carbon::now()->subdays(30))->get(['name','created_at']);
            $orders = order::where('created_at','>=',Carbon::now()->subdays($request->input('range')))->get();
            $sales = sales::where('created_at','>=',Carbon::now()->subdays($request->input('range')))->get();  
            return view('pages.orders.view')->with(compact('sales','orders'));
        }
        elseif($request->input('start') && $request->input('end')){

            $this->validate($request, [
                'start' => 'required',
                'end' => 'required'
            ]);

            //DB::Format=> 2020-04-01 00:00:00
            $start = $request->input('start')." 00:00:00";
            $end = $request->input('end')." 23:59:59";
            //return $start." -- ".$end;
     
            //get latest purchase
            $orders = order::whereBetween('created_at',[$start,$end])->orderBy('created_at','desc')->get();
            //get latest sales
            $sales = sales::where('created_at', '>=',$start)->orderBy('created_at','desc')->get();

            return view('pages.orders.view')->with(compact('sales','orders'));

        }else{
            $this->validate($request, [
                'client' => 'required',
                'item' => 'required',
                'po' => 'required',
                'rate' => 'required',
                'quantity' => 'required'
            ]);

            //add new
            $order = new order;
            $order->companies_id = $request->input('client');
            $order->items_id = $request->input('item');
            $order->PO = $request->input('po');
            $order->rate = $request->input('rate');
            $order->quantity = $request->input('quantity');
            $order->status = '0';
            $order->save();

            return redirect('/orders')->with('success', 'Order added !');
        }    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return $id;
        $this->validate($request, [
            'status' => 'required'
        ]);

        //add new
        $order = order::find($id);
        $order->status = $request->input('status');
        $order->save();

        return redirect('/orders')->with('success', 'Order status updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
