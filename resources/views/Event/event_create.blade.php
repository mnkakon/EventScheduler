@extends('Layout.admin')
@section('header')
{!! Html::Script('js/ckeditor/ckeditor.js') !!}
      <div class="col-md-9" style="margin-left: 50px;">
  <div class="add_ques">
   <h3 class="text-center">Create Event</h3><hr>
        {!! Form::open(array('url' => 'event/store',   'files' => true , 'method'=>'POST')) !!}

        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <div class="row">
      <div class="col-md-5">
      <div class="ques_title">
     
     </div>
     </div>
     </div>
       <div class="title_form">
        <div class="row">
      <div class="col-md-10">
       <input type="text" class="form-control" name="title" maxlength="80"  placeholder="Title of event...">
       </div>
       </div>
       </div>
       
       <br><hr>      
       <div class="form-group"">
        <div class="row">
      <div class="col-md-10">
       <textarea class="form-control" name="event_detail" rows="7" cols="1" placeholder="Details about event..." id="comment"></textarea>
       </div>
       </div></div>
  
      </div><br/>
      <script>
           CKEDITOR.replace( 'event_detail');
        </script>
   <br>
   <hr>
   <div class="row">
     <div class="col-md-5">
       <label>Start Time: </label>
   <input type="datetime-local"" name="start_time">
     </div>
     <div class="col-md-5">
       <label>End Time: </label>
   <input type="datetime-local"" name="end_time">
     </div>
    
   </div>
   

   
   <hr><hr>
      <div class="csc">
      <div class="row">
      
      <!-- <div class="col-md-3">
        <div class="tag_class">
             <h4>Couter Type:<br></h4>
     <select name="countertype">
  <option value="Upcounter">Upcounter</option>
  <option value="Count Down">Count Down</option>  
  </select>
        </div>
        </div> -->
       
  <div class="col-md-3">
               <div class="tag_class">
             <h4>Event Type:<br></h4>
     <select name="event_type">
     @foreach($events as $event)
  <option value="{{$event->id}}">{{$event->event_type}}</option>
 @endforeach
  </select>
        </div>   
      </div>
      <div class="col-md-5">
               <div class="tag_class">
             <h4>Accepting Department:<br></h4>
     <select name="department">
   @foreach($depts as $dept)
  <option value="{{$dept->id}}">{{$dept->dept_name}}</option>
 @endforeach
  </select>
        </div>   
      </div>
      <div class="col-md-3">
               <div class="tag_class">
             <h4>Priority:<br></h4>
     <select name="priority">
  <option value="1">Higher</option>
  <option value="2">Medium</option>  
  <option value="3">Lower</option>   
  </select>
        </div>   
      </div>
</div>
<hr><hr>
 <?php
     $userId = Auth::id();
     $deptd = \App\User::find($userId)->dept_id;
     ?>
     
<input type="hidden" name="offering_dept" value="{{$deptd}}">
  <div class="form-group">
    {!! Form::label('Event Image') !!}
    <input type="file" name="image">
</div>
</div>
<br><hr>
<br>
 
      
    
      <input type="hidden" name="id" value="<?php
    echo $userId;
     ?>">
       <button class="btn btn-success" type="submit" style="width: 100px;">Add Event</button>
      
   
    {!! Form::close() !!}
 
</div>
</div>
  </div>
  <br><br><br><br>
  </div>

  @section('footer')
   @endsection
     @endsection