<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Auth;
use \App\Event;
class HomeController extends Controller
{
    // 
     public function details($id)
    {
       $event_details = Event::find($id);
      
         return view('Event.event_details')
                ->with('event_detail',$event_details);
                
    }
     public function show()
     {
        date_default_timezone_set('Asia/Dhaka');
$ldate = date('Y-m-d H:i:s');
     	$top_event = DB::table('event')
     			        ->where('priority','1')
                        ->where('end_time','>',$ldate)
     			        ->get();
        $mid_event = DB::table('event')
                        ->where('priority','>','1')
                        ->where('end_time','>',$ldate)
                        ->get();
       
        $past_event = DB::table('event')
                        ->where('end_time','<',$ldate)
                        ->get();
                        
     	return view('Event.index')
     			->with('top_events', $top_event)
                ->with('mid_events', $mid_event)
                ->with('past_events', $past_event);
     }


      public function feed()
     {
     	$event = DB::table('event')
     			        ->get();

     	$subs = DB::table('subscription')
                        ->where('user_id', Auth::id())
                        ->get();

     	return view('Event.feed')
     			->with('events', $event)
                ->with('sub', $subs);
     }


      public function mydept()
     {
        date_default_timezone_set('Asia/Dhaka');
        $ldate = date('Y-m-d H:i:s');
         $user = Auth::user();
         $dept= $user->dept_id;

        $top_event = DB::table('event')
                        ->where('accepting_dept', $dept)
                        ->where('priority','1')
                        ->where('end_time','>',$ldate)
                        ->get(); 

        $mid_event = DB::table('event')
                        ->where('accepting_dept', $dept)
                        ->where('priority','>','1')
                        ->where('end_time','>',$ldate)
                        ->get();
       
        $past_event = DB::table('event')
                        ->where('accepting_dept', $dept)
                        ->where('end_time','<',$ldate)
                        ->get();

        return view('Event.index')
                ->with('top_events', $top_event)
                ->with('mid_events', $mid_event)
                ->with('past_events', $past_event);
     }

    public function mySubscript()
     {
        date_default_timezone_set('Asia/Dhaka');
$ldate = date('Y-m-d H:i:s');
    $user = Auth::user();
    $dept= $user->dept_id;
    $iid =$user->id;
    $subscribed = DB::table('subscription')
                    ->where('user_id',$user->id)
                    ->get();
        $top_event = DB::table('event')
        ->join('subscription', function ($join) {
            date_default_timezone_set('Asia/Dhaka');
            $ldate = date('Y-m-d H:i:s');
            $join->on('event.id', '=', 'subscription.event_id')
                 ->where('subscription.user_id','=', Auth::user()->id)
                 ->where('event.end_time','>',$ldate)
                 ->where('event.priority','=',1);
        })
        ->select('event.*', 'subscription.user_id')
        ->get();
      
       $mid_event = DB::table('event')
        ->join('subscription', function ($join) {
            date_default_timezone_set('Asia/Dhaka');
            $ldate = date('Y-m-d H:i:s');
            $join->on('event.id', '=', 'subscription.event_id')
                 ->where('subscription.user_id','=', Auth::user()->id)
                 ->where('event.end_time','>',$ldate)
                 ->where('event.priority','>',1);
        })
        ->select('event.*', 'subscription.user_id')
        ->get();
       
        $past_event = DB::table('event')
        ->join('subscription', function ($join) {
            date_default_timezone_set('Asia/Dhaka');
            $ldate = date('Y-m-d H:i:s');
            $join->on('event.id', '=', 'subscription.event_id')
                 ->where('subscription.user_id','=', Auth::user()->id)
                 ->where('event.end_time','<',$ldate);
                
        })
        ->select('event.*', 'subscription.user_id')
        ->get();
       
        return view('Event.index')
                ->with('top_events', $top_event)
                ->with('mid_events', $mid_event)
                ->with('past_events', $past_event);
     }
     
}
