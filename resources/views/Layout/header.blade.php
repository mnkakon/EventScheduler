<html>
<head>
	<title>Event Schedule</title>

  <meta charset="utf-8"/>
 

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

	<section>
		
<nav class="navbar navbar-inverse  navbar-default">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand event-title" href="{{url('/')}}">{!!Html::image('Image/logo.png', 'alt', ['class' => 'front_logo']) !!}    </a>
        </div>

     

    @if (Auth::check()) 
    <ul class="nav navbar-nav navbar-right">
     
      <?php $username = Auth::user(); ?>
      @if($username->user_type==2)
     

      <li><a href="{{url('myscription')}}">My Subscription</a></li>
<li><a href="{{url('mydept')}}">My Department</a></li>
 <li><a href="{{url('event/feed')}}"><span class="glyphicons glyphicons-book-open"></span> List of Events</a></li>
@else
<li><a href="{{url('event/list')}}">DashBoard</a></li>
@endif
      <li><div class="dropdown">
    
  <button class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="font-size:14px;color:#fff; font-style: italic; background-color:#0FE0BA;margin-top:7px; ">
    {{$username->name}}
    <span class="caret"></span>
  </button>

  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" style="min-width:30px;background:#ffe;">
   
    <li style=""><a href="{{url('logout')}}" style="">Sign out</a></li>
  </ul>
</div></li>
    </ul>
    @else
    <ul class="nav navbar-nav navbar-right">
     <li><a href="{{url('event/feed')}}"><span class="glyphicons glyphicons-book-open"></span> List of Events</a></li>
          <li><a href="{{url('register')}}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
          <li><a href="{{url('login')}}"><span class="glyphicon glyphicon-log-in"></span> Sign in</a></li>

        </ul>
    @endif
   
  </div>

</nav>
	</section>




 @yield('header')


</body>
</html>
@yield('footer')