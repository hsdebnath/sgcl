<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Fund;
use App\Account;
use App\Bank;
use App\Traits\PushMsg;

class FundsController extends Controller
{   
    use PushMsg;
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
        $funds = fund::orderBy('created_at','desc')->take(10)->get();
        return view('pages.fund.view')->with('funds', $funds);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $my_company =  Auth::user()->company_id;
        $banks = bank::where('companies_id', $my_company)->pluck('name', 'id');
        return view('pages.fund.create')->with('banks', $banks);
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
            $funds = fund::where('created_at','>=',Carbon::now()->subdays($request->input('range')))->get();

            return view('pages.fund.view')->with('funds', $funds);
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

            $funds = fund::whereBetween('created_at',[$start,$end])->orderBy('created_at','desc')->get();
            return view('pages.fund.view')->with('funds', $funds);

        }else{
        
            $this->validate($request, [
                'by' => 'required',
                'type' => 'required',
                'amount' => 'required',
                'note' => 'required'
            ]);

            //Company account adjust        
            //get old balance
            $input_amount = $request->input('amount');
            $company_id = Auth::user()->company_id;
            $balance = account::where('company_id', $company_id)->orderBy('id','desc')->take('1')->pluck('balance');
            $bank_balance = bank::where('companies_id', $company_id)->where('id', $request->input('bank'))->pluck('balance');
            
            $bank_balance = $bank_balance[0];
            //return $company_id." || ".$balance[0];
            //new account
            if ($balance->isEmpty()){
                $balance = 0;
            }else{
                $balance = $balance[0];
            }
            //return $balance;
            $debit = $input_amount;
            $credit = 0;
            $balance += $debit - $credit;

            $account = new account;
            $account->company_id = $company_id;
            $account->debit = $debit;
            $account->credit = $credit;
            $account->balance = $balance;
            $account->note = $request->input('note');
            //$out = "employee_id => ".$request->input('employee').", c_id => ".$company_id.", Debit=> ".$debit.", Credit=> ".$credit.", balance=> ".$balance.", note => ".$account->note;
            //return $out;

            //Funds log save           

            $funds = new fund;
            $funds->by = $request->input('by');
            $funds->type = $request->input('type');
            $funds->amount = $input_amount;
            $funds->note = $request->input('note');


            //User bank balance adjustment
            $bank_balance += $input_amount; 
            $bank = bank::where('companies_id', $company_id)->where('id', $request->input('bank'))->update(['balance' => $bank_balance]);

            $account->save();
            $funds->save();

            $push = $this->sendPushNotification($request->input('note'));
            return redirect('/fund')->with('success', 'Fund added !');
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
