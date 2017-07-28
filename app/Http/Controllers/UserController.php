<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use DB;
use Input;
use App\UserPending;
use App\User;
use App\Event;
use App\Event_Type;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
	public function deptCreate()
	{
		 $user = DB::table('userpending')
		 ->where('user_type','1')
		 ->get();
    	 $event = DB::table('event_type')->get();
         return view('User.DeptAdmin')
                ->with('users',$user);
    }

    public function adminInsert($id)
	{
		$request = UserPending::find($id);
		$data = new User();
                    $data->name = $request->name;
                    $data->email = $request->email;
                    $data->password = $request->password;
                    
                    $data->contact = $request->contact;
                   
                    $data->dept_id = $request->dept_id;
                    $data->user_type = $request->user_type;
       $data->save();
        if($request->delete()){
           
       return  Redirect::to('pending/admin');
   }
    }
     public function adminDelete($id)
	{

    $exam = UserPending::find($id);
          if($exam->delete()){
            return  Redirect::to('pending/admin');
    }
}

public function studentCreate()
    {
         $user = DB::table('userpending')
         ->where('user_type','2')
         ->get();
         $event = DB::table('event_type')->get();
         return view('User.Student')
                ->with('users',$user);
    }
 public function studentInsert($id)
	{
		$request = UserPending::find($id);
		$data = new User();
                    $data->name = $request->name;
                    $data->email = $request->email;
                    $data->password = $request->password;
                    $data->contact = $request->contact;                   
                    $data->dept_id = $request->dept_id;
                    $data->user_type = $request->user_type;
       $data->save();
        if($request->delete()){
           
       return  Redirect::to('pending/student');
}
    }

      public function studentDelete($id)
    {

    $exam = UserPending::find($id);
          if($exam->delete()){
            return  Redirect::to('pending/admin');
    }
}
}