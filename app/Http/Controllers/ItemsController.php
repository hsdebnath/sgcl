<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Items;
use App\Company;
use DB;

class ItemsController extends Controller
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
        //$user_id = Auth()->User()->id;
        //$user = User::find($user_id);
        $items = items::orderBy('id','desc')->paginate('20');
       return view('pages.items.all')->with('items',$items);

    }

    //Push notification start
    public function sendPushNotification() {  
        
        $push_notification_key = 'BMlciB_4RCZSEVp-4Y2Rw-Lu7H43XnGyscCR2ZveXRJLp4dXfy6tRvPtJgTJgxY7PHbMWjDj8F68qsEggrBB_sM';    
        $fcm_token = 'AAAA4xNFToM:APA91bF4VEqwSPQmJJGloUVsVo1lTtP7Y0RdBNou5Pa99-fnWhVhFc3dNT-hfoaWWOuagAZTMthXtI0L-Nn-hFJ8WPR8_w4holvrEKdFFrD5AsQ_rPDVeFmdoafLQtjrnB7ZAHfrgGXR';
        $url = "https://fcm.googleapis.com/fcm/send";            
        $header = array("authorization: key=" . $push_notification_key . "",
            "content-type: application/json"
        );    

        $postdata = '{
            "to" : "' . $fcm_token . '",
                "notification" : {
                    "title":"MSG TITLE",
                    "text" : "MSG MSG MSG"
                },
            "data" : {
                "id" : "007",
                "title":"MSG TITLE",
                "description" : "MSG MSG MSG",
                "text" : "MSG MSG MSG",
                "is_read": 0
                }
        }';

        $ch = curl_init();
        $timeout = 120;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

        // Get URL content
        $result = curl_exec($ch);    
        // close handle to release resources
        curl_close($ch);

        return $result;
    }
    //Push notification end

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
        $noti = $this->sendPushNotification();
        return $noti;
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
