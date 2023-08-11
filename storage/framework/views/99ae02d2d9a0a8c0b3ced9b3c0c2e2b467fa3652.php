

<?php $__env->startSection('content'); ?>
  
	<div class="col-lg-10 ml-5">
              <!-- Form Basic -->
             
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Customer <?php echo e($user->name); ?> Order | <b>Total Price :<?php $total=0 ?> <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php $total+=$cart->total_price ?>  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php echo e(number_format($total, 2)); ?> $</b></h6>
                </div>
              </div>
              <div class="row justify-content-center">
        <div class="col-md-8">
            <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card mb-3">
                <div class="card-body">
                    <?php $__currentLoopData = $cart->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="card-header">Item Serial #<?php echo e($item['id']); ?></div>
                    <span class="float-right">
                        <img src="<?php echo e(Storage::url($item['image'])); ?>" width="100">
                    </span>
                     <p><?php echo e($item['name']); ?></p>
                      <br>
                     <p>Price: <?php echo e($item['price']); ?> $</p>

                     <p>Quantity: <?php echo e($item['quantity']); ?></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <p>
                <button class="btn btn-warning" type="button">
                    <span class="badge badge-light">
                        Total Price :<?php echo e($cart->total_price); ?> $
                    </span>
                </button>
            </p>

            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php echo $__env->make('admin/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel_projects\laptops\resources\views/admin/all_user_orders.blade.php ENDPATH**/ ?>