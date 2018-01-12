<?php $__env->startSection('content'); ?>
	   
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
			   <?php $__currentLoopData = $orderHistory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($order->username); ?></td>
					<td><?php echo e($order->foodname); ?></td>
					<td><?php echo e($order->createdate); ?></td>
					<td></td>
					<td></td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</table>
		</div>
	</div>
</div>
<div class="form-group">
	<div class="col-md-12 col-md-offset-6">
		<button type="button" class="btn btn-primary" onclick="window.location='home'">Back</button>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>