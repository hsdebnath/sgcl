<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Sales;
use App\Order;
use App\Account;
use App\Inventory;


class SalesController extends Controller
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
        $sales = sales::where('created_at','>=',Carbon::now()->subdays(15))->get();
        
        return view('pages.sales.view')->with(compact('sales'));
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
        if($request->input('range')){
            //$last_30_days = User::where('created_at','>=',Carbon::now()->subdays(30))->get(['name','created_at']);
            $sales = sales::where('created_at','>=',Carbon::now()->subdays($request->input('range')))->get();
            return view('pages.sales.view')->with(compact('sales'));
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
            $sales = sales::whereBetween('created_at',[$start,$end])->orderBy('created_at','desc')->get();
            return view('pages.sales.view')->with(compact('sales'));

        }else{

            $this->validate($request, [
                'order' => 'required',
                'quantity' => 'required',
                'expanse' => 'required',
                'loss' => 'required'
            ]);

            //add new
            $sales = new sales;
            $sales->orders_id = $request->input('order');
            $sales->quantity = $request->input('quantity');
            $sales->expanse = $request->input('expanse');
            $sales->loss = $request->input('loss');//one line of code in account adjust section ↓
            
            //account adjust
            //get company ID
            $data = order::where('id', $sales->orders_id)->get(['companies_id','rate', 'items_id']);
            $company_id = $data[0]->companies_id;
            $rate = $data[0]->rate;

            //get old balance
            $balance = account::where('company_id', $company_id)->orderBy('id','desc')->take('1')->pluck('balance');
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
            $account->note = "Auto entry by sales";
            //$out = "c_id => ".$account->company_id.", Debit=> ".$debit.", Credit=> ".$credit.", balance=> $balance";
            //return $out;
            

            //adjust inventory
            $item = $data[0]->items_id; //from account adjust part
            $data = inventory::where('items_id', $item)->get(['quantity','rate']);

            //this code is for sales table ******
            $pur_rate = $data[0]->rate;
            //return $pur_rate;
            $sales->purchase_rate = $pur_rate;

            if ($data->isEmpty()){
                return redirect('/sales')->with('error', 'Don\'t have this item in inventory !!');            
            }else{
                $quantity = $data[0]->quantity;//old quantity
                if($quantity == 0){
                    return redirect('/sales')->with('error', 'Don\'t have enough in Inventory !!');
                }elseif($quantity > 0){

                    $quantity = $quantity - ($request->input('quantity') + $request->input('loss'));
                    if($quantity < 0){
                        return redirect('/sales')->with('error', 'Don\'t have enough in Inventory !!');
                    }
                    //return $quantity;
                    $inventory = inventory::where('items_id', $item)->update(['quantity' => $quantity]);

                }else{return redirect('/sales')->with('error', 'Inventory Error !!');}
            }

            //saving after inventory is adjusted
            $sales->save();
            $account->save();

            return redirect('/sales')->with('success', 'Item Sold !');
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
