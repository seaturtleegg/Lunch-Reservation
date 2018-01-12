@extends('layouts.master')

@section('content')
	   
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<table class="table table-hover table-bordered" border="1" cellpadding="0" style="text-align:center">
				<tr style="background-color:#CCCCCC;">
					<th>Order#</th>
					<th>Food Name</th>
					<th>Food Price</th>
					<!--<th>Amount</th>-->
					<th>Estimated Total<br></br>(include Tax & Delivery Fee)</th>
					<th>Order Date</th>
					<th>Your Choice</th>
					<th>Remove From Order</th>
			   </tr>
			   @foreach ($orderInfo as $order)
				<tr>
					<td>{{$order->foodid}}</td>
					<td>{{$order->foodname}}</td>
					<td>${{$order->foodprice}}</td>
					<td>$9.00</td>
					<td>{{$order->createdate}}</td>
					<td>{{$order->addons}}</td>
					<td>
						<form method="POST" action="removeOrderItem/{{$order->id}}">
						 {{csrf_field()}} 
						 <button data-toggle="tooltip" data-placement="top" title="Delete" type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this item?');"><span class="glyphicon glyphicon-remove"></span></button>
						</form>
					</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>
<div class="form-group">
	<div class="col-md-12 col-md-offset-5">
		<form class="form-horizontal" role="form" method="POST" action="confirm">
        {{ csrf_field() }}
			<button type="submit" class="btn btn-primary">
				Confirm
			</button>
			<button type="button" class="btn btn-primary col-md-offset-1" onclick="window.location='home'">
				Back
			</button>
		</form>
	</div>
</div>
@endsection
