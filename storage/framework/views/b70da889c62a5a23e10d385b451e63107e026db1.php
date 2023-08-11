

<?php $__env->startSection('content'); ?>

 <div class="container">
 	<div class="row justify-content-center">
 		<div class="col-md-8">
            <span class="badge badge-warning">
              
            </span>
 			<?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart_key => $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

 			<div class="card mb-3">
 				<div class="card-body">
 					<?php $__currentLoopData = $cart->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php if($order_all[$cart_key] ==0): ?>
                        Status:  <span class="bg-info text-white">Pending</span>
                     <?php else: ?>
                        Status:       <span class="bg-success text-white">Shipped</span>
                     <?php endif; ?>
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
 						Total Price :<?php echo e($cart->total_price); ?>

 					</span>
 				</button>
 			</p>

 			</div>
 			 			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 		</div>
 	</div>
 </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel_projects\laptops\resources\views/order.blade.php ENDPATH**/ ?>