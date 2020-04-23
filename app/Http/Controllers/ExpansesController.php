<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\expanse;
use App\user;
use App\account;
use App\bank;

class ExpansesController extends Controller
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
        $expanses = expanse::where('created_at','>=',Carbon::now()->subdays(15))->get();
        return view('pages.expanse.view')->with('expanses', $expanses);
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
        $users = user::pluck('name', 'id');
        return view('pages.expanse.create')->with(compact('users', 'banks'));
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
            
            $expanses = expanse::where('created_at','>=',Carbon::now()->subdays($request->input('range')))->get();

            return view('pages.expanse.view')->with('expanses', $expanses);
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

            $expanses = expanse::whereBetween('created_at',[$start,$end])->orderBy('created_at','desc')->get();
            return view('pages.expanse.view')->with('expanses', $expanses);

        }else{

            $this->validate($request, [
                'type' => 'required',
                'amount' => 'required',
                'note' => 'required',
                'bank' => 'required'
            ]);

            $input_amount = $request->input('amount');
            
            //Company account adjust        
            //get old balance
            $company_id = Auth::user()->company_id;
            $balance = account::where('company_id', $company_id)->orderBy('id','desc')->take('1')->pluck('balance');
            $bank_balance = bank::where('companies_id', $company_id)->where('id', $request->input('bank'))->pluck('balance');
            
            $bank_balance = $bank_balance[0];
            //return $company_id." || ".$balance[0];
            //new account
            if ($balance->isEmpty()){
                return redirect('/expanse')->with('error', 'Dont have enough balance !');
            }else{
                $balance = $balance[0];
                if($bank_balance < $input_amount){return redirect('/expanse')->with('error', 'Dont have enough balance !');}
            }        

            //return $balance;
            $debit = 0;
            $credit = $input_amount;
            $balance += $debit - $credit;

            $account = new account;
            $account->company_id = $company_id;
            $account->debit = $debit;
            $account->credit = $credit;
            $account->balance = $balance;
            $account->note = $request->input('note');
            //$out = "employee_id => ".$request->input('employee').", c_id => ".$company_id.", Debit=> ".$debit.", Credit=> ".$credit.", balance=> ".$balance.", note => ".$account->note;
            //return $out;

            //Expanse log save           
            //type => [salary, legal, bank_miscellaneous, other
            if ($request->input('type') == 'salary') {

                $expanse = new expanse;
                $expanse->user_id = $request->input('employee');
                $expanse->type = $request->input('type');
                $expanse->amount = $input_amount;
                $expanse->note = $request->input('note');
                
            }elseif ($request->input('type') == 'legal' || $request->input('type') == 'bank_miscellaneous' || $request->input('type') == 'other'){

                $expanse = new expanse;
                $expanse->type = $request->input('type');
                $expanse->amount = $input_amount;
                $expanse->note = $request->input('note');

            }else{

                return redirect('/expanse')->with('error', 'Something wrong with input, please try again !');
            }

            //User bank balance adjustment
            $bank_balance -= $input_amount; 
            $bank = bank::where('companies_id', $company_id)->where('id', $request->input('bank'))->update(['balance' => $bank_balance]);

            $account->save();
            $expanse->save();
            return redirect('/expanse')->with('success', 'Expance added !');
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
