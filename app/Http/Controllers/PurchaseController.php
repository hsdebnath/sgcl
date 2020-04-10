<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\purchase;
use App\user;
Use App\account;
use App\inventory;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchase = purchase::all();
        return view('pages.purchase.view')->with('purchase',$purchase);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = user::pluck('name', 'id');
        return view('pages.purchase.create')->with('users', $users);
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
            'vendor' => 'required',
            'item' => 'required',
            'quantity' => 'required',
            'rate' => 'required'
        ]);

        //add new
        $purchase = new purchase;
        $purchase->items_id = $request->input('item');
        $purchase->quantity = $request->input('quantity');
        $purchase->rate = $request->input('rate');
        $purchase->save();

        
        //adjust inventory
        $item = $request->input('item');
        $data = inventory::where('items_id', $item)->get(['quantity','rate']);
        if ($data->isEmpty()){
            $quantity = $request->input('quantity');
            $rate = $request->input('rate');
            
            $inventory = new inventory;
            $inventory->items_id = $item;
            $inventory->quantity = $quantity;
            $inventory->rate = $rate;
            $inventory->save();
            
        }else{
            $quantity = $data[0]->quantity;//old quantity
            $rate = $data[0]->rate;//old rate
            if($quantity == 0){
                $quantity = $request->input('quantity');
                $rate = $request->input('rate');

                $inventory = inventory::where('items_id', $item)->update(['quantity' => $quantity, 'rate' => $rate]);

            }elseif($quantity > 0){
                $old = $quantity * $rate;
                $new = $request->input('quantity') * $request->input('rate');

                $quantity = $quantity + $request->input('quantity');
                $rate = ($old + $new)/($quantity);

                $inventory = inventory::where('items_id', $item)->update(['quantity' => $quantity, 'rate' => $rate]);

            }else{return redirect('/purchase')->with('error', 'Inventory Error !!');}
        }

        //return "Item=> ".$item." || quantity=> ".$quantity." || rate=> ".$rate;


        //account adjust        
        //get old balance
        $company_id = $request->input('vendor');
        $balance = account::where('company_id', $company_id)->pluck('balance');
        //return $company_id." || ".$balance[0];
        //new account
        if ($balance->isEmpty()){
            $balance = 0;
        }else{
            $balance = $balance[0];
        }
        //return $balance;
        $debit = 0;
        $credit = $request->input('quantity') * $request->input('rate');
        $balance += $debit - $credit;

        $account = new account;
        $account->company_id = $company_id;
        $account->debit = $debit;
        $account->credit = $credit;
        $account->balance = $balance;
        $account->note = "manual entry note";
       // $out = "c_id => ".$account->company_id.", Debit=> 0, Credit=> ".$credit.", balance=> $balance";
        //return $out;
        $account->save();

        return redirect('/purchase')->with('success', 'Item purchased !');
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
