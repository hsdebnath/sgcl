<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Company;
use App\Account;
use App\Traits\PushMsg;

class CompaniesController extends Controller
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
        $my_company =  Auth::user()->company_id;
        $company = company::where('id', '!=', $my_company)->orderBy('id','desc')->paginate('20');
       return view('pages.company.view')->with('company',$company);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.company.create');
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
            'phone' => 'required',
            'address' => 'required',
            'balance' => 'required',
        ]);

        //add new
        $company = new company;
        $company->name = $request->input('name');
        $company->phone = $request->input('phone');
        $company->address = $request->input('address');
        $company->save();

        //add opening balance 
        $new_company_id = company::select('id')->orderBy('id','desc')->take('1')->get();
        //return $new_company_id[0]->id;
        $account = new account;
        $account->company_id = $new_company_id[0]->id;
        $account->debit = '0';
        $account->credit = '0';
        $account->balance = $request->input('balance');
        $account->note = "Opening balance of ".$company->name;
        $account->save();

        $push = $this->sendPushNotification("New Company added !!");
        return redirect('/company')->with('success', 'Company added !!');
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
