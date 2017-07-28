@extends('Layout.admin')
@section('header')

      <div class="col-md-9">
      <h4 class="text-center"><b>List of Events</b></h4>
      <div style="margin-top: 30px;margin-left: 50px;">
      <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Title</th>
                <th>Details</th>
                <th>Start time</th>
                <th>End Time</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
       
        <tbody>
        @foreach($event as $event)
            <tr>
                <td><a href="{{ route('event.details',['id' => $event->id ]) }}">{{$event->title}}</a></td>
                <td>{{$event->description}}</td>
                <td>{{$event->start_time}}</td>
                <td>{{$event->end_time}}</td>
                <td><button class="btn btn-warning" onclick="location.href='{{ route('event.update',['id' => $event->id ]) }}'">Edit</button></td>
                <td><button class="btn btn-danger" onclick="location.href='{{ route('event.delete',['id' => $event->id ]) }}'">Delete</button></td>
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