

<?php $__env->startSection('content'); ?>
  
	<div class="col-lg-10 ml-5">
              <!-- Form Basic -->
              
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Order Table</h6>
                </div>
                <div class="card-body">
                    <?php if(count($orders)>1): ?>
                    <div class="table-responsive p-3">
                    	<table class="table table-hover table-flush align-items-center" id="data_table">
                    		<thead>
                    			<th>OrderNumder</th>
                                <th>status</th>
                    			<th>Name</th>
                    			<th>Email</th>
                                <th>Date</th>
                                <th>method</th>
                                <th>Explore</th>
                    		</thead>
                    		<tbody>
                    		 <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    			<tr>
                                    <td><?php echo e($order->id); ?></td>
                                    <td>
                                         <?php if($order->status == 0): ?>
                                         <span class="p-1 btn-info text-white">Pending</span>
                                         <?php else: ?>
                                         <span class="p-1 bg-success text-white">
                                            Shipped
                                         </span>
                                         <?php endif; ?>
                                    </td>
                    				<td><?php echo e($order->user->name ??" "); ?></td>
                    				<td><?php echo e($order->user->email ??" "); ?></td>
                    				<td>
                                        <?php echo e(date('Y-m-d',strtotime($order->created_at))); ?>

                                    </td>
                                    <td>
                                        <?php if($order->method == 0): ?>
                                         <span class="p-1 bg-primary text-white">Cashe</span>
                                         <?php else: ?>
                                         <span class="p-1 bg-secondary text-white">
                                             Bank Card
                                         </span>
                                         <?php endif; ?>
                                    </td>
                                    <td>
                                      <?php if($order->user && $order->status ==0): ?>
                                              <a href="<?php echo e(route('approve_order',[$order->id])); ?>" class="btn btn-sm btn-secondary btn-sm">Approve</a>
                                       <?php endif; ?>
                                       <?php if($order->user): ?>
                                              <a href="<?php echo e(route('order_view',[$order->user->id,$order->id])); ?>" class="btn btn-info btn-sm">View Orders</a>
                                       <?php endif; ?>
                                        
                                        <a class="btn btn-danger btn-sm" href="<?php echo e(route('order_delete',$order->id)); ?>">Delete Order</a>
                                    </td>
                    			</tr>
                    		 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    		</tbody>
                    	</table>
                    </div>
                    <?php else: ?>
                       <p> No Orders made yet.</p>
                    <?php endif; ?>
                </div>
              </div>
    </div>
<script type="text/javascript">
	function checkDelete()
	{
		 if(confirm('Are you sure you want delete this entry ??'))
		 {
		 	return true;
		 }
		 return false;
	}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel_projects\laptops\resources\views/admin/user_orders.blade.php ENDPATH**/ ?>