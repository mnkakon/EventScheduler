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
   @if($userRole->user_type== 3)
{!! Form::open(array('url' => 'dept/store',  'method'=>'POST')) !!}

 <div class="title_form">
        <div class="row">
      <div class="col-md-9 col-md-offset-1">
       
       
                <input type="text" class="form-control" name="dept_name" maxlength="80"  placeholder="Add New Event Department...">
              <br>  <input type="text" class="form-control" name="dept_code" maxlength="80"  placeholder="Add Department Code...">
                    <br>
                      <button type="submit" class="btn btn-info btn-flat">Add New Department!</button>
                   
           
       </div>
       </div>
       </div>
       {!! Form::close() !!}
       @endif
       <br><br><hr>
      
       <div class="row">
       <div class="col-md-9 col-md-offset-1">   
        <h2 class="text-center">Departments</h2><br>
       <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Department Name</th>
                <th>Department Code</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        @foreach($departments as $department)
            <tr>
                <td>{{$department->id}}</td>
                <td>{{$department->dept_name}}</td>
                <td>{{$department->dept_code}}</td>
                <td>@if($userRole->user_type== 3)<button class="btn btn-danger" onclick="location.href='{{ route('dept.delete',['id' => $department->id ]) }}'">Delete</button> 
                @else<button class="btn btn-default disabled" onclick="">Delete</button> 
                @endif</td>
            </tr>
            @endforeach
          </tbody>
    </table>
    </div>
    </div>
  @section('footer')
   @endsection
     @endsection