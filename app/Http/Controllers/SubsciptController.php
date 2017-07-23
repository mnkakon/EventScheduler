<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use DB;
use Input;
use App\UserPending;
use App\Subscription;
use App\User;
use App\Event;
use App\Event_Type;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SubsciptController  extends Controller
{
	public function getSubscript($id)
	{
                 $data = new Subscription();
                    $data->user_id = Auth::id();
                    $data->event_id = $id;
                    
       $data->save();
       return  Redirect::to('event/feed');
    }


    public function unSubscript($id)
    {
        $data = Subscription::find($id);
        $data->delete();
       return  Redirect::to('event/feed');
    }
    
}