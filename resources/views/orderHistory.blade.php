@extends('layouts.master')

@section('content')
	   
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<table class="table table-hover table-bordered" border="1" cellpadding="0" cellspacing="0" style="text-align:center">
				<tr style="background-color:#CCCCCC;">
					<th>Login Name</th>
					<th>Food Name</th>
					<th>Createtime</th>
					<th>Restaurant</th>
					<th>Final Price</th>
			   </tr>
			   @foreach ($orderHistory as $order)
				<tr>
					<td>{{$order->username}}</td>
					<td>{{$order->foodname}}</td>
					<td>{{$order->createdate}}</td>
					<td></td>
					<td></td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>
<div class="form-group">
	<div class="col-md-12 col-md-offset-6">
		<button type="button" class="btn btn-primary" onclick="window.location='home'">Back</button>
	</div>
</div>
@endsection
