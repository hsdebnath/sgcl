<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use\App\Order;
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
        $orders = Order::orderBy('id','desc')->paginate('20');
        return view('pages.orders.view')->with('orders',$orders);
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
