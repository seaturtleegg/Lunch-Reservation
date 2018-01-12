<?php $__env->startSection('content'); ?>

<!DOCTYPE html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>

	
        


            <div id = '1grad1'> 
<div class="container" style="margin-top:3%">
	<div class="row clearfix">
		<div class="col-md-4 column">
			<form action="index.php?act=go" method="post" class="form-horizontal" role="form">
				<div class="form-group">
					 <label for="wo" class="col-sm-12">订单查询</label>
					<div class="col-sm-12">
						<input type="text" class="form-control" name="wo" />
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-12 col-xs-12" style="display: inline-block">
						 <button type="submit" class="btn btn-default btn-block" name="login">查询</button>
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-8 column">
			<div class="carousel slide" id="carousel-8836">
				<ol class="carousel-indicators">
					<li class="active" data-slide-to="0" data-target="#carousel-8836">
					</li>
					<li data-slide-to="1" data-target="#carousel-8836">
					</li>
					<li data-slide-to="2" data-target="#carousel-8836">
					</li>
				</ol>
				<div class="carousel-inner">
					<div class="item active">
						<img alt="" src="./public/images/default.jpg" />
						<div class="carousel-caption">
							<h4>
								标题1
							</h4>
							<p>
								内容1
							</p>
						</div>
					</div>
					<div class="item">
						<img alt="" src="./public/images/default1.jpg" />
						<div class="carousel-caption">
							<h4>
								标题2
							</h4>
							<p>
								内容2
							</p>
						</div>
					</div>
					<div class="item">
						<img alt="" src="./public/images/default2.jpg" />
						<div class="carousel-caption">
							<h4>
								标题3
							</h4>
							<p>
								内容3
							</p>
						</div>
					</div>
				</div> <a class="left carousel-control" href="#carousel-8836" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-8836" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>
		</div>
	</div>
	<!--<div class="row clearfix" style="margin-top: 5%">
		<div class="col-md-12 column">
			<p class="text-center breadcrumb">
				 <strong>站点咨询</strong><br>
			</p>
		</div>
	</div>-->
</div>
</div>
       
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>