<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\expanse;
use App\user;
use App\account;

class ExpansesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expanses = expanse::orderBy('id','desc')->paginate('2');
        return view('pages.expanse.view')->with('expanses', $expanses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = user::pluck('name', 'id');
        return view('pages.expanse.create')->with('users', $users);
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
            'amount' => 'required',
            'note' => 'required'
        ]);
        
        //Company account adjust        
        //get old balance
        $company_id = Auth::user()->company_id;
        $balance = account::where('company_id', $company_id)->orderBy('id','desc')->take('1')->pluck('balance');
        //return $company_id." || ".$balance[0];
        //new account
        if ($balance->isEmpty()){
            return redirect('/expanse')->with('error', 'Dont have enough balance !');
        }else{
            $balance = $balance[0];
            if($balance < $request->input('amount')){return redirect('/expanse')->with('error', 'Dont have enough balance !');}
        }
        //return $balance;
        $debit = 0;
        $credit = $request->input('amount');
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
            $expanse->amount = $request->input('amount');
            $expanse->note = $request->input('note');
            
        }elseif ($request->input('type') == 'legal' || $request->input('type') == 'bank_miscellaneous' || $request->input('type') == 'other'){

            $expanse = new expanse;
            $expanse->type = $request->input('type');
            $expanse->amount = $request->input('amount');
            $expanse->note = $request->input('note');

        }else{

            return redirect('/expanse')->with('error', 'Something wrong with input, please try again !');
        }

        $account->save();
        $expanse->save();
        return redirect('/expanse')->with('success', 'Expance added !');
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
