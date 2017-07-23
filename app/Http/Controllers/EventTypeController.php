<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Input;
use App\Event_type;
use App\Department;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class EventTypeController extends Controller
{
    //
    public function show(){
    	$eventType = DB::table('event_type')->get();
    	 return view('Event_type.type_create')
                ->with('eventTypes',$eventType);
    }

    public function store(){
    	$eventType = new Event_Type();
        $eventType->event_type =  Input::get('event_type');
        $eventType->save();
        return redirect()->route('event/type');
    }
    public function dept_show(){
        $department = DB::table('department')->get();
         return view('Event_type.department')
                ->with('departments',$department);
    }

    public function create(){
         $department = new Department();
        $department->dept_code =  Input::get('dept_code');
        $department->dept_name =  Input::get('dept_name');

        $department->save();
        return redirect()->route('dept');
    }

        public function delete($id)
    {
         $department = Department::find($id);
          if($department->delete()){
            return redirect()->route('dept');
    }
    }

}
