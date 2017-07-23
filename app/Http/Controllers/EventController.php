<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use DB;
use Input;
use App\User;
use App\Event;
use App\Event_Type;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    //

	public function create()
    {
    	 $dept = DB::table('department')->get();
    	 $event = DB::table('event_type')->get();
         return view('Event.event_create')
                ->with('events',$event)
                ->with('depts', $dept);
    }
     
     public function store(Request $request)
    {
         
    if(Input::hasFile('image')){
     $image = Input::file('image');
     $imagename = $image->getClientOriginalName();
     $image->move('Image',$image->getClientOriginalName());
    }
    else
        $imagename = 'background.png';
   
        $exam = new Event();
        $exam->title =  Input::get('title');
        $exam->description = Input::get('event_detail');
        $exam->start_time = Input::get('start_time');
        $exam->end_time = Input::get('end_time');
        $exam->imagelink = $imagename;
        $exam->counter_type = Input::get('countertype');
        $exam->priority = Input::get('priority');
        $exam->status = '0';
        $exam->counter_type = '0';
        $exam->priority = Input::get('priority');
        $exam->user_id = Input::get('id');
        $exam->offering_dept = Input::get('offering_dept');
        $exam->accepting_dept = Input::get('department');
        $exam->event_type = Input::get('event_type');
        $exam->course_id = '1';

        $exam->save();
            
    return redirect()->route('event.create');
   
   
        }

    public function edit($id){ 
         $exam = Event::find($id);
         $dept = DB::table('department')->get();
         $event = DB::table('event_type')->get();
         return view('Event.event_edit')
                ->with('events', $exam) 
                ->with('event_type',$event)
                ->with('depts', $dept);
    }
     public function update_save($id)
   { 
    $exam = Event::find($id);
    if(Input::hasFile('image')){
     $image = Input::file('image');
     $imagename = $image->getClientOriginalName();
     $image->move('Image',$image->getClientOriginalName());
      
    }
    else
        $imagename = $exam->imagename;
       
        $exam->title =  Input::get('title');
        $exam->description = Input::get('event_detail');
        $exam->start_time = Input::get('start_time');
        $exam->end_time = Input::get('end_time');
        $exam->counter_type = Input::get('countertype');
        $exam->priority = Input::get('priority');
        $exam->status = '0';
        $exam->imagelink = $imagename;
        $exam->counter_type = Input::get('countertype');
        $exam->priority = Input::get('priority');
        $exam->user_id = Input::get('id');
        $exam->offering_dept = Input::get('offering_dept');
        $exam->accepting_dept = Input::get('department');
        $exam->event_type = Input::get('event_type');
        $exam->course_id = '1';

        if($exam->save()){
            return redirect()->route('event.create');
    }
    }
    public function list(){
        $event = DB::table('event')->get();
         return view('Event.event_list')
                ->with('events', $event);
    }
    public function destroy($id)
    {
         $exam = Event::find($id);
          if($exam->delete()){
            return redirect()->route('event.list');
    }
    }

    public function read(){
        $eventType = DB::table('event_type')->get();
         return view('Event_type.type_create')
                ->with('eventTypes',$eventType);
    }

public function stock(){
        $eventType = new Event_Type();
        $eventType->event_type =  Input::get('event_type');
        $eventType->save();
        return redirect()->route('event.type');
    }
    public function delete($id)
    {
         $Event_Type = Event_Type::find($id);
          if($Event_Type->delete()){
            return redirect()->route('event.type');
    }
    }

    public function update($id)
    {
         $Event_Type = Event_Type::find($id);
         $Event_Type->event_type =  Input::get('event_type');
         return $Event_Type->event_type;
         $Event_Type->save();
            return redirect()->route('event.type');
    }
   public function myevent(){
    $id = Auth::id();
    $event = DB::table('event')
            ->where('user_id',$id)
              ->get();
    return view('Event.myevent')
        ->with('event',$event);
   }
}
