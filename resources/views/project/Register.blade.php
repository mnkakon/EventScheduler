<?php

use \App\User;

?>

@extends('Layout.header')
@section('header')


  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    {!! Html::style('css/main.css') !!}

  <style type="text/css">
    body{
        background-color: #E9EBEE;
    }
    .login{
        width:680px;
        height: 570px;
        padding-left: 100px;
        margin-left: 300px;
        margin-top: 20px;
        background-color: #fff;
    }
</style>



<div class=login>
 {!! Form::open(array('route' => 'postregister', 'method' =>'POST') ) !!}


    <div class="row">

      <div class="col-sm-1">
      </div>
      
      <div class="col-sm-8">
      <h1>Create an account</h1>
          <h4>It's free and always will be</h4 ><br>
    
       <input type="text" class="form-control" name="name" maxlength="80" placeholder="First Name">
       
       <br>
     
       <input type="email" class="form-control" name="email" maxlength="80"  placeholder="Email address">
       <br>
        
     
       <input type="password" class="form-control" name="password" maxlength="80" placeholder="Password">
       

    <br>
     
     
        
   



   <input type="text" class="form-control" name="contact_no" maxlength="800" placeholder="Contact Number"> <br>
 

    <h4>Department:</h4>
     <select name="department" class="form-control">
   @foreach($depts as $dept)
  <option value="{{$dept->id}}">{{$dept->dept_name}}</option>
   @endforeach
  </select>
 <h4>User Type:</h4>
     <select name="user_type" class="form-control">
   
  <option value="1">Department Admin</option>
  <option value="2">Student</option>
  </select>


<br>
        <button type="Submit" class="btn btn-success btn-large">Register</button>
    <br><br>
     </div>
    
   </div>
{!! Form::close() !!}
</div>
  {!! Html::script('plugins/jQuery/jquery-2.2.3.min.js') !!}
  {!! Html::style('bootstrap/js/bootstrap.min.js') !!}
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  @section('footer')
   @endsection
     @endsection 