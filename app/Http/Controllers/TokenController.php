<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Token;

class TokenController extends Controller
{
    public function token(Request $request){
        
        //return $request->input('Token');

        // $this->validate($request, [
        //     'Token' => ['required'],
        //     'Model' => ['required'],
        // ]);

        //save token
        $token = new Token;
        $token->Token = $request->input('Token');
        $token->Model = $request->input('Model');
        $token->save();

        //$tokens = Token::all();
        //return $tokens;
    }
}
