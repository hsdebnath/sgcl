<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\bank;
use App\account;

class BanksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $company = Auth::user()->company_id;
        $banks = bank::where('companies_id', $company)->get();
        return view('pages.bank.view')->with('banks', $banks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.bank.create');
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
            'name' => 'required',
            'branch' => 'required',
            'number' => 'required',
            'balance' => 'required'
        ]);
        
        $user_company = Auth::user()->company_id;
        
        //get old balance
        $user_balance = account::where('company_id', $user_company)->orderBy('id','desc')->take('1')->pluck('balance');
        //for new User account
        if ($user_balance->isEmpty()){
            $user_balance = 0;
        }else{
            $user_balance = $user_balance[0];
        }
        //return $user_balance." -".$user_company;

        //create bank
        $bank = new bank;
        $bank->companies_id = $user_company;
        $bank->name = $request->input('name');
        $bank->ac_number = $request->input('number');
        $bank->branch = $request->input('branch');
        $bank->balance = $request->input('balance');
        
        //User account adjustment
        $user_debit = $request->input('balance');
        $user_credit = 0;
        $user_balance += $user_debit - $user_credit;

        $user_account = new account;
        $user_account->company_id = $user_company;
        $user_account->debit = $user_debit;
        $user_account->credit = $user_credit;
        $user_account->balance = $user_balance;
        $user_account->note = "Opening balance- ".$request->input('name')." - ".$request->input('branch');
        
        $bank->save();
        $user_account->save();

        return redirect('/bank')->with('success', 'Bank Added !! ');

        
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
