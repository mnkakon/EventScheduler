<?php 
use App\Event_type;
use App\Department;
 ?>
@extends('Layout.header')
@section('header')
<style type="text/css">
  .backitem{


  }
</style>

<meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
  <link rel="stylesheet" href="/css/owl.carousel.css">
  <link rel="stylesheet" href="/css/owl.carousel.min.css">
  <link rel="stylesheet" href="/css/owl.theme.default.min.css">

   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
  

   <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="/css/main.css">


  <section class="header_slide">
    <div class="container-fluid">
      <div class="row">
        <div class="">

          <div class="owl-carousel" id="header_slide">
            @foreach($top_events as $top_event)
              <div class="slide1 bg notice img_sl" data-endtime="{{strtotime($top_event->end_time)}}">

                <div class="overlay"></div>
                <h2 ><a href="{{ route('event.details',['id' => $top_event->id ]) }}" class="top_event1">{{substr($top_event->title,0,18)}}</a></h2>

                <div class="head-text">
                  <div class="col-md-6 col-md-offset-3">
                    <div class="counter">
                      <ul>
                            <li><span class="days timenumbers">01</span>
                              <p class="timeRefDays timedescription">days</p>
                            </li>
                            <li><span class="hours timenumbers">00</span>
                              <p class="timeRefHours timedescription">hours</p>
                            </li>
                            <li><span class="minutes timenumbers">00</span>
                              <p class="timeRefMinutes timedescription">minutes</p>
                            </li>
                            <li><span class="seconds timenumbers yellow-text">00</span>
                              <p class="timeRefSeconds timedescription">seconds</p>
                            </li>
                        </ul>
                    </div>
                  </div>
                  <?php 
                    $event_type = Event_Type::find($top_event->event_type);
                    $department = Department::find($top_event->accepting_dept);
                   ?>
                  <h4 class="text-center1">Event Type:  {{$event_type->event_type}}</h4>  <h4 class="text-center1">Department:  {{$department->dept_name}}</h4> 
                </div>
                 <img src="/Image/{{$top_event->imagelink}}">
              </div>
            @endforeach

            <!-- <div class="slide3 bg">
              <div class="overlay"></div>
              <div class="head-text">
                <div class="col-md-6 col-md-offset-3">
                  <p>asd</p>
                </div>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6" style="padding-left: 5px; padding-right: 5px;">
          <div class="p-u-item">
          
          <p class="past-notice">Past Events</p>
          <div class="kakon owl-theme">

            @foreach($past_events as $past_event)
            
            <div class="slide1 pn-bg notice pn-img_sl item" data-endtime="{{strtotime($past_event->end_time)}}">

              <div class="overlay_bel"></div>
              <h2 ><a href="{{ route('event.details',['id' => $past_event->id ]) }}" class="top_event">{{substr($past_event->title,0,18)}}</a></h2>
              <div class="pn-head-text">
                <?php 
                  $event_type = Event_Type::find($past_event->event_type);
                  $department = Department::find($past_event->accepting_dept);
                 ?>
                <h4 class="text-center" style="color:#dfdfdf;">Event Type:  {{$event_type->event_type}}</h4> <h4 class="text-center" style="color:#dfdfdf;">Department:  {{$department->dept_code}}</h4>  
              </div>
              <img src="/Image/{{$past_event->imagelink}}">
            </div>
            @endforeach
          </div>
        </div>
        </div>
        <div class="col-md-6" style="padding-left: 5px; padding-right: 5px;">
      <div class="p-u-item">
          
          <p class="past-notice">Upcoming Events</p>
          <div class="kakon owl-theme">

            @foreach($mid_events as $mid_event)
            
            <div class="slide1 pn-bg notice pn-img_sl item" data-endtime="{{strtotime($mid_event->end_time)}}">

              <div class="overlay_bel"></div>
              <h2 ><a href="{{ route('event.details',['id' => $mid_event->id ]) }}" class="top_event">{{substr($mid_event->title,0,18)}}</a></h2>
              <div class="pn-head-text">
                <?php 
                  $event_type = Event_Type::find($mid_event->event_type);
                  $department = Department::find($mid_event->accepting_dept);
                 ?> 
                <h4 class="text-center" style="color:#dfdfdf;">Event Type:  {{$event_type->event_type}}</h4> <h4 class="text-center" style="color:#dfdfdf;">Department:  {{$department->dept_code}}</h4>  
              </div>
              <img src="/Image/{{$mid_event->imagelink}}">
            </div>
            @endforeach
          </div>
        </div>
        </div>

      </div>

    </div>
  </section>



  
<script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js
"></script>
<!-- Bootstrap 3.3.6 -->
<!-- <script src="/bootstrap/js/bootstrap.min.js"></script> -->
<!-- FastClick -->
<script src="/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="/plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>

  <script src="/js/moment.js"></script>
  <script src="/js/jquery-3.1.0.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/owl.carousel.min.js"></script>
  <script src="/js/script.js"></script>


  @section('footer')
   @endsection
     @endsection 