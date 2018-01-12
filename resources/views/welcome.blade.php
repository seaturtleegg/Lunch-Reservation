@extends('layouts.master')

@section('header')
<style type="text/css">
* {
    box-sizing: border-box;
}

.rst{
	width:290px;
	left: 50%;
	margin-top: 40px;
	margin-left: -145px;
	height:148px;
	position:absolute;
}
.header{
	background: url(./images/Background1.jpg)no-repeat;
	background-size: cover;
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	text-align: center;
	padding:0.1em 0 20em;
}
.header-label{
	padding:3em;
}
.header-label h1{
	font-weight: 800;
	font-size:4em;	
}
.header-outline{
	color: #FF0000;
	background: url(./images/Background1.jpg)no-repeat;
	text-align: left;
	padding: 1em 0 2.7em;
}
.header-outline h1{
	font-weight: 700;
	display:inline;
	font-size: 1.5em; 
}
@media (max-width:1280px){
}
@media (max-width:1024px){
	.header{
		padding: 0.1em 0 13em;
	}
	.header-label h1{
		font-size:2em;
	}
	.fudong{
		display:none;
	}
}


@media (max-width:375px){
	.header{
		padding: 0.1em 0 1em;
	}
	.header-label h1{
		font-size:2em;
	}
}
 
</style>

@section('content')

	
        


	<div class="header sTop" id="home">
		<div class="container">
			<div class="header-label" >
				<h1 style="color:#ffffcc;">SMS Assist</h1>
				<h1 style="color:#99ffbb;">Lunch Reservation</h1>
			</div>
		</div>
	</div>	

	<div class="center">
		<div class="cnt"><marquee style="font-size:21px; color:#0000FF; direction:left;"><img src="images/tp009.gif" width=15> Welcome to use lunch reservation system. Enjoy your lunch!</marquee></div>
		<div class="pic4"></div>
	    <div class="pic4"></div>
		<div class="pic4"></div>
	    <div class="pic4"></div>
		<div class="regist">
			<span style="margin-top:5px; font-size:22px;">User Login</span>
		</div>
		<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
  
                <div class="panel-body">
		<form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">User Name</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                      <!--  <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>
						-->

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
								<button type="button" class="btn btn-primary" onclick="window.location='{{ route("register") }}'">Register
                                </button>
								
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
					 </div>
            </div>
        </div>
    </div>
</div>
		</div>
		<div class="leftbottom" style="margin-top:170px;"><div id="timer" ></div></div>
	</div>
       
@stop