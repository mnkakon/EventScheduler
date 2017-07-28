@extends('Layout.admin')
@section('header')
<?php 
use \App\User;
use \App\Department;
$uI = Auth::id();
$userRole = User::find($uI);

?>
      <div class="col-md-9">
      <h4 class="text-center"><b>Student Requests</b></h4>
      <div style="margin-top: 30px;margin-left: 50px;">
      <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Department</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Accept</th>
                <th>Suspend</th>
            </tr>
        </thead>
       
        <tbody>
        @foreach($users as $user)
        <?php
         $department = Department::find($user->dept_id);
        ?>
        
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$department->dept_name}}</td>
                <td>{{$user->email}}</td>
                
                <td>{{$user->contact}}</td>
                <td>
              <button class="btn btn-info" onclick="location.href='{{ route('student.create',['id' => $user->id ]) }}'">Accept</button></td>
              <td> <button class="btn btn-danger" onclick="location.href='{{ route('student.delete',['id' => $user->id ]) }}'">Suspend</button></td>
            </tr>
            @endforeach
          </tbody>
    </table>
      <div>
        
      </div>
 </div>
</div>
</div>
  </div>
  <br><br><br><br>
  </div>
  
  @section('footer')
   @endsection
     @endsection