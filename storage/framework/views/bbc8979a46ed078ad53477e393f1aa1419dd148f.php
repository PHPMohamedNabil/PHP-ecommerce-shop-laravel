

<?php $__env->startSection('content'); ?>
  
	<div class="col-lg-10 ml-5">
              <!-- Form Basic -->
              
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Users</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive p-3">
                    	<table class="table table-hover table-flush align-items-center" id="data_table">
                    		<thead>
                    			<th>Id</th>
                    			<th>Name</th>
                    			<th>Email</th>
                                <th>join Date</th>
                                <th>Orders</th>
                    		</thead>
                    		<tbody>
                    		 <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    			<tr>
                    				<td><?php echo e($user->id); ?></td>
                    				<td><?php echo e($user->name); ?></td>
                    				<td><?php echo e($user->email); ?></td>
                                    <td><?php echo e($user->created_at); ?> </td>
                                    <td>
                                        <a href="<?php echo e(route('user_orders_admin',$user->id)); ?>" class="btn btn-success">Orders </a>
                                        <a href="<?php echo e(route('deleteUser',$user->id)); ?>" class="btn btn-danger">Delete </a>
                                    </td>
                    			</tr>
                    		 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    		</tbody>
                    	</table>
                    </div>
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
<?php echo $__env->make('admin/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel_projects\laptops\resources\views/admin/users.blade.php ENDPATH**/ ?>