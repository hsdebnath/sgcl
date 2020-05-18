<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expanse;
use App\Sales;
use Carbon\Carbon;

class reportsController extends Controller
{   
    use PushMsg;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get latest purchase
        $expanse = expanse::where('created_at','>=',Carbon::today()->subdays(15))->orderBy('created_at','desc')->get();
        //get latest sales
        $sales = sales::where('created_at','>=',Carbon::today()->subdays(15))->orderBy('created_at','desc')->get();
        $msg = "Last 15 days NET : ";
        return view('pages.report')->with(compact('expanse', 'sales', 'msg'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //$last_30_days = User::where('created_at','>=',Carbon::now()->subdays(30))->get(['name','created_at']);

        //used for date range data viewer
        if($request->input('range')){
            //get latest purchase
            $expanse = expanse::where('created_at','>=',Carbon::today()->subdays($request->input('range')))->orderBy('created_at','desc')->get();
            //get latest sales
            $sales = sales::where('created_at','>=',Carbon::today()->subdays($request->input('range')))->orderBy('created_at','desc')->get();
            $msg = "Last ".$request->input('range')." days NET : ";
            return view('pages.report')->with(compact('expanse', 'sales', 'msg'));
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
            $expanse = expanse::whereBetween('created_at',[$start,$end])->orderBy('created_at','desc')->get();
            //get latest sales
            $sales = sales::whereBetween('created_at',[$start,$end])->orderBy('created_at','desc')->get();
            $msg = "Selected range  NET : ";  

            return view('pages.report')->with(compact('expanse', 'sales', 'msg'));
        }
        else{
            return redirect('pages.report')->with('error', 'Inappropriate Range !!');
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
