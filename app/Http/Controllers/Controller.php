<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use App\Models\location;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function abc(Request $request){
    
    
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
          event(new \App\Events\first_event('cds'));
        }
         return 'good';
    }
    public function abc1(Request $request){
    
    if($request->has(['latitude', 'longitude','user'])){
 
       $status= $this->checkChangeLocation($request->latitude,$request->longitude,$request->user);
        if($status){
          event(new \App\Events\first_event($request->latitude, $request->longitude, $request->user));
        }
       
    }
     
       return view('test');
  }
  public function dropdowns(Request $request){
    

      $a=[];
     
       for($i=0;$i<count($request->ids);$i++){
        $status= location::where('user_id',$request->ids[$i])->where('created_at','like','2023-04-10%')->latest()->first();
      
        array_push($a, $status);
       }
      return response()->json(['data' => $a]);
   
  }
  public function dropdown(Request $request){
    

   
 
        return view('search_employee_dropdown');
   
  }

 

  public function checkChangeLocation($latitude, $longitude, $user){
    $record = location::where('user_id',$user)->where('created_at','like','2023-04-10%')->latest()->first();
      if($record=="" || ($record->latitude!=$latitude && $record->longitude!=$longitude))
      {
        location::create([
          'user_id' => $user,
          'latitude'=>$latitude,
          'longitude'=>$longitude
      ]);
        return true;
      }
      return false;
  }
}
