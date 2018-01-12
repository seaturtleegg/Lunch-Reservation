<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Fonts 
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">-->
	
	<link href="http://localhost/LunchReservation/css/bootstrap.min.css" rel="stylesheet">
	<link href="http://localhost/LunchReservation/css/style.css" type="text/css" rel="stylesheet" />
	<script src="https://code.jquery.com/jquery.js"></script>
	<script src="http://localhost/LunchReservation/js/bootstrap.min.js"></script>
	
	<script type="text/javascript" src="http://localhost/LunchReservation/js/jquery.js"></script> 
	<script type="text/javascript" src="http://localhost/LunchReservation/js/jquery.validate.js"></script> 
	<script type="text/javascript" src="http://localhost/LunchReservation/js/validate-ex.js"></script>
	<script type="text/javascript" src="http://localhost/LunchReservation/js/jquery.validate.messages_cn.js"></script>




	@yield('header')
</head>
	
<body style="height:100%" width="100%">
@if (Route::has('login'))
<div class="top-right links">
	@if (Auth::check())
	<nav class="navbar navbar-default" role="navigation" style="background-color: white;">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span><span class="icon-bar"></span>
				<span class="icon-bar"></span><span class="icon-bar"></span>
			</button><a class="navbar-brand" href="home">Lunch Reservation</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li class="">
					 <a href="orderHistory">Order History</a>
				</li>
				<li class="">
					 <a href="#">Transfer Balance</a>
				</li>
				<li class="">
					 <a href="#">Support</a>
				</li>
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
             </ul>
		</div>
	</nav>
	@endif
</div>
@endif

	@yield('content')
	
	@yield('footer')
	

</body>
</html>