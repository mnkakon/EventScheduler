
<!DOCTYPE html>
<head>
  <title>Event Scheduler</title>
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
  .front_logo{
    width: 150px;
    height: 48px;
     position:absolute;
     top: 0;
  }
</style>
</head>

<body>
<?php $na= "http://localhost:8000/" ?>
<nav class="navbar navbar-inverse  navbar-default">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand event-title" href="{{url('index')}}">{!!Html::image('Image/logo.png', 'alt', ['class' => 'front_logo']) !!}  
        </a>
        </div>

     

    @if (Auth::check()) 
    <ul class="nav navbar-nav navbar-right">
     
      <?php $username = Auth::user();?>
     
     <li><a href="{{url('event/list')}}">DashBoard</a></li>
 <li><div class="dropdown">
    
  <button class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="font-size:14px;color:#fff; font-style: italic; background-color:#0FE0BA;margin-top:7px;">
    {{$username->name}}
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" style="min-width:30px;background:#ffe;">
   
    <li><a href="{{url('logout')}}">Sign out</a></li>
  </ul>
</div></li>
    </ul>
    @else
    <ul class="nav navbar-nav navbar-right">
          <li><a href="{{url('login')}}"><span class="glyphicon glyphicon-user"></span> Sign in</a></li>
          
        </ul>
    @endif
   
  </div>

</nav>
<?php 
use \App\User;
$uI = Auth::id();
$userRole = User::find($uI);
use \App\Department;
    $dept = Department::find($userRole->dept_id); 
    use \App\UserPending;
    $up = DB::table('userpending') 
            ->count('id'); 

$stu = DB::table('userpending') 
            ->where('user_type',2)  
            ->count('id'); 
      
?>
<div class="col-md-2">
  <aside class="main-sidebar" style="background-color: #1A2226;height: 1000px;margin-top: 0px;">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
       @if($userRole->user_type== 1)
        <div class="pull-left image">
        {!!Html::image('Image/admin.png', 'alt', ['class' => 'img-circle']) !!}  
        </div>
        <div class="pull-left info">
          <p style="color: #dfdfdf"> {{$username->name}}</p>
          
          
           <a href="#"><i class="fa fa-circle text-success"></i> Admin - {{$dept->dept_code}}</a>
           @elseif($userRole->user_type== 3)
            <div class="pull-left image">
        {!!Html::image('Image/sAdmin.png', 'alt', ['class' => 'img-circle']) !!}  
        </div>
        <div class="pull-left info">
          <p style="color: #dfdfdf"> {{$username->name}}</p>
            <a href="#"><i class="fa fa-circle text-success"></i>Super Admin</a>
            @endif
        </div>
      </div>
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header" style="color: #eee;">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#" style="color:#fff;">
            <i class="fa fa-dashboard"></i> <span>Events</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li class="active" style="color: #dfdfdf;"><a href="{{url('event/list')}}"><i class="fa fa-circle-o"></i>Event List</a></li>
            <li style="color: #dfdfdf;"><a href="{{url('event/create')}}"><i class="fa fa-circle-o"></i>Create Event</a></li>
            <li style="color: #dfdfdf;"><a href="{{url('event/myevent')}}"><i class="fa fa-circle-o"></i>My Events</a></li>
          </ul>
        </li>
        
         <li class="treeview">
          <a href="#" style="color:#fff;">
            <i class="fa fa-dashboard"></i> <span>User Requests</span><span class="label label-primary pull-right" style="margin-top: 2px;">{{$up}}</span>
            <span class="pull-right-container">
             
            </span>
          </a>
          <ul class="treeview-menu">
          @if($userRole->user_type== 3)
          <?php $dept = DB::table('userpending') 
            ->where('user_type',1)  
            ->count('id'); 
            ?>
           <li class="active" style="color: #dfdfdf;"><a href="{{url('pending/admin')}}"><i class="fa fa-circle-o"></i>Department Admin<span class="label label-primary pull-right" style="margin-top: 2px;">{{$dept}}</span></a></li>
           @endif
            <li style="color: #dfdfdf;"><a href="{{url('pending/student')}}"><i class="fa fa-circle-o"></i>Student<span class="label label-primary pull-right" style="margin-top: 2px;">{{$stu}}</span></a></li>
           
          </ul>
        </li>

            <li class="active"><a  style="color: #fff;" href="{{url('event/type')}}">  <i class="fa fa-dashboard"></i>Event Types</a></li>
            <li class="active"><a style="color: #fff;" href="{{url('department')}}">  <i class="fa fa-dashboard"></i>Departments</a></li>

          </ul>
        </li>
    </section>
    <!-- /.sidebar -->
  </aside>
      </div>
      @yield('header')


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
</body>
</html>
@yield('footer')