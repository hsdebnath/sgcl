<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\items;
use App\Company;
use DB;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$user_id = Auth()->User()->id;
        //$user = User::find($user_id);
        $items = items::orderBy('id','desc')->paginate('2');
       return view('pages.items.all')->with('items',$items);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        //$users = user::all();
        $my_company =  Auth::user()->company_id;
        $users = company::where('id', '!=', $my_company)->pluck('name', 'id');
        return view('pages.items.create')->with('users', $users);
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
            'vendor' => 'required',
            'unit' => 'required'
        ]);

        //add new
        $item = new items;
        $item->name = $request->input('name');
        $item->vendor_id = $request->input('vendor');
        $item->unit = $request->input('unit');
        $item->save();

        return redirect('/items')->with('success', 'Item added !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = DB::table("items")->where("vendor_id",$id)->pluck("name","id");

        return json_encode($items);
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
