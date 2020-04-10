<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sales;
use App\order;
use App\account;
use App\inventory;


class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = sales::all();
        return view('pages.sales.view')->with('sales',$sales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders = order::where('status', '0')->pluck('PO', 'id');
        return view('pages.sales.create')->with('orders', $orders);
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
            'order' => 'required',
            'quantity' => 'required',
            'expanse' => 'required'
        ]);

        //add new
        $sales = new sales;
        $sales->orders_id = $request->input('order');
        $sales->quantity = $request->input('quantity');
        $sales->expanse = $request->input('expanse');
       // $sales->save();

        //account adjust
        //get company ID
        $data = order::where('id', $sales->orders_id)->get(['users_id','rate', 'items_id']);
        $company_id = $data[0]->users_id;
        $rate = $data[0]->rate;
        //get old balance
        $balance = account::where('company_id', $company_id)->pluck('balance');
        //new account
        if ($balance->isEmpty()){
            $balance = 0;
        }else{
            $balance = $balance[0];
        }
        //return $company_id[0]." || ".$company_id[1]." || ".$balance;
        $debit = ($request->input('quantity') * $rate)-$sales->expanse;
        $credit = 0;
        $balance += $debit - $credit;

        $account = new account;
        $account->company_id = $company_id;
        $account->debit = $debit;
        $account->credit = $credit;
        $account->balance = $balance;
        $account->note = "manual entry note";
        //$out = "c_id => ".$account->company_id.", Debit=> ".$debit.", Credit=> ".$credit.", balance=> $balance";
        //return $out;
        //$account->save();

        //adjust inventory
        $item = $data[0]->items_id; //from account adjust part
        $data = inventory::where('items_id', $item)->get(['quantity','rate']);

        if ($data->isEmpty()){
            return redirect('/sales')->with('error', 'Inventory Error !!');            
        }else{
            $quantity = $data[0]->quantity;//old quantity
            if($quantity == 0){
                return redirect('/sales')->with('error', 'Don\'t have enough in Inventory !!');
            }elseif($quantity > 0){

                $quantity = $quantity - $request->input('quantity');
                if($quantity < 0){
                    return redirect('/sales')->with('error', 'Don\'t have enough in Inventory !!');
                }
                //return $quantity;
                $inventory = inventory::where('items_id', $item)->update(['quantity' => $quantity]);

            }else{return redirect('/sales')->with('error', 'Inventory Error !!');}
        }

        return redirect('/sales')->with('success', 'Item Sold !');
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
        //
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
