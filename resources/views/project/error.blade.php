<?php

use App\User;

?>

@extends('Layout.header')
@section('header')



  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
    {!! Html::style('css/main.css') !!}

  <style type="text/css">
    body{
        background-color: #E9EBEE;
    }
    .login{
        width:600px;
        height: 340px;
        padding-left: 150px;
        margin-left: 340px;
        margin-top: 100px;
        background-color: #fff;
    }
</style>
<div class=login>
    <div class="row">

      
      <div class="col-md-8">
    <h2 style="text-align: center;">Your Access is forbidden!!</h2>
    <h3 class="text-center">Please Go back!!</h3>

<br>
</div>
</div>
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