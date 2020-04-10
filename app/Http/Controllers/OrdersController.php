<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Order;
use\App\user;
use\App\items;
use DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('pages.orders.view')->with('orders',$orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = user::pluck('name', 'id');
        $items = items::pluck('name', 'id');
        return view('pages.orders.create')->with(compact('users', 'items'));
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
        $order->users_id = $request->input('client');
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
        //
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
