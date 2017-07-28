@extends('Layout.admin')
@section('header')
	<?php 
use \App\User;
$uI = Auth::id();
$userRole = User::find($uI);
?>
  <div class="col-md-9">
  <div class="add_ques" style="margin-left: 50px;">
      
   <br><hr>
{!! Form::open(array('url' => 'e_type/store',  'method'=>'POST')) !!}
<h3 class="text-center">Event Types</h3><br>
 <div class="title_form">
        <div class="row">
      <div class="col-md-10">
       
       <div class="input-group input-group-sm">
                <input type="text" class="form-control" name="event_type" maxlength="80"  placeholder="Add New Event Type...">
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-info btn-flat">Create Event Type!</button>
                    </span>
              </div>
       </div>
       </div>
       </div>
       {!! Form::close() !!}
       <br><br><hr><br>
       <div class="row">
    
       <div class="col-md-10">   
       <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Event Type</th>
                <th>Delete</th>
            </tr>
        </thead>
       
        <tbody>
        @foreach($eventTypes as $eventType)
            <tr>
                <td>{{$eventType->id}}</td>
                <td>{{$eventType->event_type}}</td>
                <td>@if($userRole->user_type== 3)<button class="btn btn-danger" onclick="location.href='{{ route('event_type.delete',['id' => $eventType->id ]) }}'">Delete</button>
                @else<button class="btn btn-default disabled" onclick="">Delete</button> @endif</td>
            </tr>
            @endforeach
          </tbody>
    </table>
    </div>
    </div>
{!! Form::model($eventType, array('route' => array('event_type.update', $eventType->id), 'method' => 'PUT')) !!}
    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content" style="background-color: #FC7C2A;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Event Types</h4>
        </div>
        <div class="modal-body">
          <input name="event_type" type="text" class="form-control">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal" onclick="location.href='{{ route('event_type.update',['id' => $eventType->id ]) }}'">Update</button>
        </div>
      </div>
    </div>
  </div>
{!! Form::close() !!}

 
  @section('footer')
   @endsection
     @endsection