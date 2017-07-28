
<?php 
use \App\Event_type;
use \App\Department;
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
  {!! Html::style('css/main.css') !!}
  {!! Html::style('css/font-awesome.min.css') !!}
  {!! Html::style('css/owl.carousel.css') !!}
  {!! Html::style('css/owl.carousel.min.css') !!}
  {!! Html::style('css/owl.theme.default.min.css') !!}
  {!! Html::style('dist/css/AdminLTE.min.css') !!}
  {!! Html::style('plugins/jvectormap/jquery-jvectormap-1.2.2.css') !!}
  {!! Html::style('dist/css/AdminLTE.min.css') !!}
  {!! Html::style('/dist/css/skins/_all-skins.min.css') !!}
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">


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
                <img src="{{asset('Image/1.jpg')}}">
                
              </div>
            @endforeach

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
             
                 {!!Html::image('Image/{{$past_event->imagelink}}', 'alt')!!}  
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
              {!!Html::image('Image/{{$mid_event->imagelink}}', 'alt')!!}  
            </div>
            @endforeach
          </div>
        </div>
        </div>

      </div>

    </div>
  </section>


{!! Html::script('/js/bootstrap.min.js') !!}
  {!! Html::script('/plugins/jQuery/jquery-2.2.3.min.js') !!}
  {!! Html::script('/plugins/fastclick/fastclick.js') !!}
  {!! Html::script('/plugins/sparkline/jquery.sparkline.min.js') !!}
  {!! Html::script('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}
  {!! Html::script('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}
  {!! Html::script('plugins/slimScroll/jquery.slimscroll.min.js') !!}
  {!! Html::script('/plugins/chartjs/Chart.min.js') !!}
  {!! Html::script('/dist/js/pages/dashboard2.js') !!}
  {!! Html::script('/js/moment.js') !!}
  {!! Html::script('/js/jquery-3.1.0.min.js') !!}
  {!! Html::script('js/script.js') !!}
  {!! Html::script('/dist/js/demo.js') !!}
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js
"></script>


  @section('footer')
   @endsection
     @endsection 