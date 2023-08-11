

<?php $__env->startSection('content'); ?>
  
	<div class="col-lg-10 ml-5">
              <!-- Form Basic -->
              
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Products</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive p-3">
                    	<table class="table table-hover table-flush align-items-center" id="data_table">
                    		<thead>
                    			<th>Img</th>
                    			<th>Name</th>
                    			<th>Price</th>
                    			<th>Stock</th>
                                <th>Category</th>
                    			<th>Action</th>
                    		</thead>
                    		<tbody>
                    		 <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    			<tr>
                                    <td>
                                        <img src="<?php echo e(asset(Storage::url($product->img))); ?>" width="45" height="45">
                                    </td>
                    				<td><?php echo e($product->name); ?></td>
                    				<td><?php echo e($product->price); ?> L.E</td>
                                    <td><?php echo e($product->stock); ?></td>
                    				<td><?php echo e($product->category->name ?? ''); ?></td>
                    				
                    				<td>
                                        <a href="<?php echo e(route('product.edit',$product->id)); ?>" class="btn btn-primary btn-sm">
                                            Edit
                                        </a>
                    					<form action="<?php echo e(route('product.destroy',$product->id)); ?>" method="post" style="display:inline-block;" onsubmit="return checkDelete();">
                    						<?php echo csrf_field(); ?>
                    						<?php echo e(method_field('DELETE')); ?>

                    						<button type="submit" name="" class="btn btn-sm btn-danger">
                    							Delete
                    						</button>
                    					</form>
                    					
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
<?php echo $__env->make('admin/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel_projects\laptops\resources\views/admin/Products/index.blade.php ENDPATH**/ ?>