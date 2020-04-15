<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\company;
use App\account;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $accounts = account::orderBy('id','desc')->paginate('2');
        return view('pages.transaction.view')->with('accounts', $accounts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $my_company =  Auth::user()->company_id;
        $companies = company::where('id', '!=', $my_company)->pluck('name', 'id');
        return view('pages.transaction.create')->with('companies', $companies);
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
            'type' => 'required',
            'company' => 'required',
            'amount' => 'required',
            'note' => 'required'
        ]);
        
        $client_company = $request->input('company');
        $user_company = Auth::user()->id;
        
        //get old balance
        $client_balance = account::where('company_id', $client_company)->pluck('balance');
        $user_balance = account::where('company_id', $user_company)->pluck('balance');
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
        if($request->input('type') == 1){//I paid to 
            if($user_balance <= 0){
                return redirect('/account')->with('error', 'Not enough Money In Account !!');
            }
            //client account adjustment
            $client_debit = $request->input('amount');
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
            $user_credit = $request->input('amount');
            $user_balance += $user_debit - $user_credit;

            $user_account = new account;
            $user_account->company_id = $user_company;
            $user_account->debit = $user_debit;
            $user_account->credit = $user_credit;
            $user_account->balance = $user_balance;
            $user_account->note = $request->input('note');
            $user_account->save();

            return redirect('/account')->with('success', 'Transaction Added !! ');

        }elseif($request->input('type') == 2){//I recieved payment from

            //client account adjustment
            $client_debit = 0;
            $client_credit = $request->input('amount');
            $client_balance += $client_debit - $client_credit;

            $client_account = new account;
            $client_account->company_id = $client_company;
            $client_account->debit = $client_debit;
            $client_account->credit = $client_credit;
            $client_account->balance = $client_balance;
            $client_account->note = $request->input('note');
            $client_account->save();
            
            //User account adjustment
            $user_debit = $request->input('amount');
            $user_credit = 0;
            $user_balance += $user_debit - $user_credit;

            $user_account = new account;
            $user_account->company_id = $user_company;
            $user_account->debit = $user_debit;
            $user_account->credit = $user_credit;
            $user_account->balance = $user_balance;
            $user_account->note = $request->input('note');
            $user_account->save();

            return redirect('/account')->with('success', 'Transaction Added !! ');

        }else{
            return redirect('/account')->with('error', 'maipulated input !! please try again ');
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
