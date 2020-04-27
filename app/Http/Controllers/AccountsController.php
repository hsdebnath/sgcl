<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use App\Company;
use App\Account;
use App\Bank;

class AccountsController extends Controller
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
        $users = user::all();
        $company = company::all();
        $accounts = account::where('created_at','>=',Carbon::today()->subdays(15))->get();
        return view('pages.transaction.view')->with(compact('accounts','users','company'));
    }

    public function view()
    {   
        $users = user::all();
        $company = company::all();
        $accounts = account::all();
        return view('pages.transaction.view')->with(compact('accounts','users','company'));
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
        $companies = company::where('id', '!=', $my_company)->pluck('name', 'id');
        return view('pages.transaction.create')->with(compact('companies', 'banks'));
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

            $users = user::all();
            $company = company::all();
            $accounts = account::where('created_at','>=',Carbon::now()->subdays($request->input('range')))->get();

            return view('pages.transaction.view')->with(compact('accounts','users','company'));
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

            $users = user::all();
            $company = company::all();
            $accounts = account::whereBetween('created_at',[$start,$end])->orderBy('created_at','desc')->get();
            return view('pages.transaction.view')->with(compact('accounts','users','company'));

        }else{

            $this->validate($request, [
                'type' => 'required',
                'company' => 'required',
                'amount' => 'required',
                'bank' => 'required',
                'note' => 'required'
            ]);
            
            $input_amount = $request->input('amount');
            $client_company = $request->input('company');
            $user_company = Auth::user()->id;
            $user_company_id = Auth::user()->company_id;
            
            //get old balance
            $client_balance = account::where('company_id', $client_company)->orderBy('id','desc')->take('1')->pluck('balance');
            $user_balance = account::where('company_id', $user_company)->orderBy('id','desc')->take('1')->pluck('balance');
            $bank_balance = bank::where('companies_id', $user_company_id)->where('id', $request->input('bank'))->pluck('balance');
            
            $bank_balance = $bank_balance[0];
            //new Client account
            if ($client_balance->isEmpty()){
                $client_balance = 0;
            }else{
                $client_balance = $client_balance[0];
            }
            //new User account
            if ($user_balance->isEmpty()){
                $user_balance = 0;
            }else{
                $user_balance = $user_balance[0];
            }
                
            // Type : 1 = paid to || 2 = Recieved From //

            if($request->input('type') == 1){ //I paid to 
                if($bank_balance < $input_amount){
                    return redirect('/account')->with('error', 'Not enough Money In Account !!');
                }
                //client account adjustment
                $client_debit = $input_amount;
                $client_credit = 0;
                $client_balance += $client_debit - $client_credit;

                $client_account = new account;
                $client_account->company_id = $client_company;
                $client_account->debit = $client_debit;
                $client_account->credit = $client_credit;
                $client_account->balance = $client_balance;
                $client_account->note = $request->input('note');
                $client_account->save();

                //User account adjustment
                $user_debit = 0;
                $user_credit = $input_amount;
                $user_balance += $user_debit - $user_credit;

                $user_account = new account;
                $user_account->company_id = $user_company;
                $user_account->debit = $user_debit;
                $user_account->credit = $user_credit;
                $user_account->balance = $user_balance;
                $user_account->note = $request->input('note');
                $user_account->save();

            //User bank balance adjustment
            $bank_balance -= $input_amount; 
            $bank = bank::where('companies_id', $user_company)->where('id', $request->input('bank'))->update(['balance' => $bank_balance]);

                return redirect('/account')->with('success', 'Transaction Added !! ');

            }elseif($request->input('type') == 2){ //I recieved payment from

                //client account adjustment
                $client_debit = 0;
                $client_credit = $input_amount;
                $client_balance += $client_debit - $client_credit;

                $client_account = new account;
                $client_account->company_id = $client_company;
                $client_account->debit = $client_debit;
                $client_account->credit = $client_credit;
                $client_account->balance = $client_balance;
                $client_account->note = $request->input('note');
                $client_account->save();
                
                //User account adjustment
                $user_debit = $input_amount;
                $user_credit = 0;
                $user_balance += $user_debit - $user_credit;

                $user_account = new account;
                $user_account->company_id = $user_company;
                $user_account->debit = $user_debit;
                $user_account->credit = $user_credit;
                $user_account->balance = $user_balance;
                $user_account->note = $request->input('note');
                $user_account->save();

                //User bank balance adjustment
            $bank_balance += $input_amount; 
            $bank = bank::where('companies_id', $user_company)->where('id', $request->input('bank'))->update(['balance' => $bank_balance]);

                return redirect('/account')->with('success', 'Transaction Added !! ');

            }else{
                return redirect('/account')->with('error', 'maipulated input !! please try again ');
            }

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
