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
<div class="container">
      <h4 class="text-center"><b>List of Events</b></h4>
      <div style="margin-top: 30px;margin-left: 50px;">
      <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Details</th>
                <th>Start time</th>
                <th>End Time</th>
                @if(Auth::check())
                <th>Subscription</th>
                @endif
            </tr>
        </thead>
       
        <tbody>
        @foreach($events as $event)
            <tr>
            <td><a href="{{ route('event.details',['id' => $event->id ]) }}">{{$event->id}}</a></td>
                <td>{{$event->title}}</td>
                <td>{!!html_entity_decode($event->description)!!}</td>
                <td>{{$event->start_time}}</td>
                <td>{{$event->end_time}}</td>
                <?php $i=0; ?>
                 @if(Auth::check())
                  @foreach($sub as $subscription)
                  @if($event->id == $subscription->event_id)
                <th><button class="btn btn-danger btn-large" onclick="location.href='{{ route('unsubs',['id' => $subscription->id ]) }}'">Subscribed</button></th><?php $i=1; break;?>
                @endif
                @endforeach
                @if($i==0)
                <td><button class="btn btn-info btn-lrg" onclick="location.href='{{ route('event.subs',['id' => $event->id ]) }}'">Subscribe</button></td>
                @endif

                @endif
            </tr>
           
            @endforeach
          </tbody>
    </table>
      <div>
        
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