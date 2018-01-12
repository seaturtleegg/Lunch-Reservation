<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
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




	<?php echo $__env->yieldContent('header'); ?>
</head>
	
<body style="height:100%" width="100%">
<?php if(Route::has('login')): ?>
<div class="top-right links">
	<?php if(Auth::check()): ?>
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
                        <?php if(Auth::guest()): ?>
                            <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                            <li><a href="<?php echo e(route('register')); ?>">Register</a></li>
                        <?php else: ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <?php echo e(Auth::user()->username); ?> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
             </ul>
		</div>
	</nav>
	<?php endif; ?>
</div>
<?php endif; ?>

	<?php echo $__env->yieldContent('content'); ?>
	
	<?php echo $__env->yieldContent('footer'); ?>
	

</body>
</html>