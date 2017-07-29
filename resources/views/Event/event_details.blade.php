<?php 
use \App\Event_Type;
use \App\Department;
 ?>
@extends('Layout.header')
@section('header')
<meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css"> 
   
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   {!! Html::style('dist/css/AdminLTE.min.css') !!}
  {!! Html::style('css/main.css') !!}
  {!! Html::style('plugins/jvectormap/jquery-jvectormap-1.2.2.css') !!}
  {!! Html::style('dist/css/skins/_all-skins.min.css') !!}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<style type="text/css">
  .backdiv {
    position: absolute;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('/Image/{{$event_detail->imagelink}}');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 1500px 750px;
    
    opacity: .3;

  }

  @import url("https://fonts.googleapis.com/css?family=Roboto:400,100,300,700");

.details #image-background {
  
  position: fixed;
  top: 50%;
  left: 50%;
  min-width: 100%;
  min-height: 100%;
  width: 100%;
  height: auto;
  opacity: .3;
  -webkit-transform: translateX(-50%) translateY(-50%);
  -ms-transform: translateX(-50%) translateY(-50%);
  transform: translateX(-50%) translateY(-50%);
}


::-webkit-input-placeholder {
  color: #fff !important;
}

::-moz-placeholder {
  color: #fff !important;
}

:-moz-placeholder {
  color: #fff !important;
}

:-ms-input-placeholder {
  color: #fff !important;
}

a:hover {
  color: #00c8aa;
  text-decoration: none;
  outline: none;
}

a {
  transition: all 0.2s cubic-bezier(0.42, 0, 0.58, 1);
  cursor: pointer;
  color: #FFF;
}

p {
  font-size: 18px;
}

section ul li {
  display: inline-block;
  width: 13rem;
}

.main {
  background-size: cover;
  display: table;
  height: 100vh;
  width: 100%;
  position: absolute;
  /* top: 0; */
  z-index: 1;
  overflow-x: hidden;
  background: rgba(0, 0, 0, 0.4);
}

.content {
  display: table-cell;
  text-align: center;
  vertical-align: middle;
}

h1 {
  color: #fff;
  font-weight: 100;
  font-size: 67px;
}

.alert-success {
  color: #fff;
  background-color: #27AE60;
}

.alert-danger {
  color: #fff;
  background-color: #FF1D4D;
}

.alert {
  font-size: 14px;
  padding: 15px;
  font-weight: 600;
  margin-bottom: 0px;
  border: 0px solid transparent;
  border-radius: 0px;
}

.input-group-addon {
  padding: 0px 0px;
  font-size: 0px;
  font-weight: 0;
  line-height: 0;
  color: #555;
  text-align: center;
  background-color: #eee;
  border: 0px solid #ccc;
  border-radius: 0px;
}

.counter {
  color: #fff;
}

.counter p {
  color: rgba(255, 255, 255, 0.85);
}

.counter h2 {
  font-size: 40px;
  font-weight: 700;
}

.description {
  color: #fff;
}

.description-bordar {
  border: 2px solid #fff;
  padding: 5px;
  margin: 10px;
}  
</style>
<div class="details" data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
    <main><img id="image-background" src="{{ asset('/Image/'.$event_detail->imagelink)}}">
      <section class="main">
        <div class="content">
          <div class="container">
            <div class="content2">
              <h1>{{$event_detail->title}}</h1>
            </div>
            
          </div>
          <div class="description">
            <div class="description-bordar">
              <h2>Description: </h2>
              <p>{!!html_entity_decode($event_detail->description)!!}</p>
            </div>
            <div class="description-bordar">
              <h2>Start Time: </h2>
              <p>{{$event_detail->start_time}}</p>
            </div>
            <div class="description-bordar">
              <h2>End Time: </h2>
              <p>{{$event_detail->end_time}}</p>
            </div>
                 <?php  
                   $event_type = Event_Type::find($event_detail->event_type);
                    $department = Department::find($event_detail->accepting_dept);
                 ?>

            <div class="description-bordar">
              <h2>Event Type: </h2>
              <p>{{$event_type->event_type}}</p>
            </div>
            <div class="description-bordar">
              <h2>Department: </h2>
              <p>{{$department->dept_name}}</p>
            </div>
          </div>
        </div>
      </section>
    </main>
    
</div>




  {!! Html::script('plugins/jQuery/jquery-2.2.3.min.js') !!}
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js
"></script>

{!! Html::script('/js/bootstrap.min.js') !!}
{!! Html::script('dist/js/app.min.js') !!}
{!! Html::script('plugins/sparkline/jquery.sparkline.min.js') !!}
{!! Html::script('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}
{!! Html::script('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}
{!! Html::script('plugins/slimScroll/jquery.slimscroll.min.js') !!}
{!! Html::script('dist/js/pages/dashboard2.js') !!}
{!! Html::script('dist/js/demo.js') !!}

  @section('footer')
   @endsection
     @endsection 