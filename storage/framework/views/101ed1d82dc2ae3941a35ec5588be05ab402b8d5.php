<?php $__env->startSection('content'); ?>
	   
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
			   <?php $__currentLoopData = $orderInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($order->foodid); ?></td>
					<td><?php echo e($order->foodname); ?></td>
					<td>$<?php echo e($order->foodprice); ?></td>
					<td>$9.00</td>
					<td><?php echo e($order->createdate); ?></td>
					<td><?php echo e($order->addons); ?></td>
					<td>
						<form method="POST" action="removeOrderItem/<?php echo e($order->id); ?>">
						 <?php echo e(csrf_field()); ?> 
						 <button data-toggle="tooltip" data-placement="top" title="Delete" type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this item?');"><span class="glyphicon glyphicon-remove"></span></button>
						</form>
					</td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</table>
		</div>
	</div>
</div>
<div class="form-group">
	<div class="col-md-12 col-md-offset-5">
		<form class="form-horizontal" role="form" method="POST" action="confirm">
        <?php echo e(csrf_field()); ?>

			<button type="submit" class="btn btn-primary">
				Confirm
			</button>
			<button type="button" class="btn btn-primary col-md-offset-1" onclick="window.location='home'">
				Back
			</button>
		</form>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>