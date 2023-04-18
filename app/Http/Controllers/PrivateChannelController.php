<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PrivateChannelController extends Controller
{
    public function channelTest(Request $request){
  
        if($request->has(['email','password'])){
          
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            event(new \App\Events\private_channel_test_event('cds'));
            }
        
        }
        return view('login');
    }
}
