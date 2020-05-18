<?php

namespace app\Traits;
use App\Token;
use DB;


trait PushMsg 
{
    public function sendPushNotification($message ) {  
        
        $tokens = DB::table('tokens')->pluck('Token');
        //return $tokens;
        foreach ($tokens as $token){        

            $fcm_token = $token;
            $title = "Trady: ";
            $url = "https://fcm.googleapis.com/fcm/send";            
            $header = [
            'authorization: key= AAAALIQPCOk:APA91bFo6sYpgPSo8y0KN3yLzFawktTKe1qGLL1cI487s-NWOj9FtDkUn5P1-cYZch2NGpfCwBfKEjztZAVWszDd6AXF0YxNrfIeErF2OPh5_bliH9xe-oTTRHK2FP0WobSfn_tKmvPP',
            'content-type: application/json'
            ];    

            $postdata = '{
                "to" : "' . $fcm_token . '",
                    "notification" : {
                        "title":"' . $title . '",
                        "text" : "' . $message . '"
                    },
                "data" : {
                    "id" : "005",
                    "title":"' . $title . '",
                    "description" : "' . $message . '",
                    "text" : "' . $message . '",
                    "is_read": 0
                }
            }';

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

            $result = curl_exec($ch);    
            curl_close($ch);
        }    

    }
}
