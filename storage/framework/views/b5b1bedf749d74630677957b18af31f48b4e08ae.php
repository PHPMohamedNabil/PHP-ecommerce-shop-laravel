

<?php $__env->startSection('content'); ?>

 <div class="container">
 	<?php if($errors->any()): ?>
 	   <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="alert alert-danger">
        	<?php echo e($error); ?>

        </div>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 	<?php endif; ?>
 	<?php if($cart): ?>
 	<table id="cart" class="table table-hover">
 		<thead>
 			<tr>
 				<th scope="col">#</th>
 				<th scope="col">Image</th>
 				<th scope="col">Product</th>
 				<th scope="col">Price</th>
 				<th scope="col">Quantity</th>
 				<th scope="col">update</th>
 				<th>Remove</th>
 			</tr>
 		</thead>
 		<tbody>
 		 <?php $__currentLoopData = $cart->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 			<tr>
 				<td>#</td>
 				<td><img src="<?php echo e(Storage::url($product['image'])); ?>" width="100" /></td>
 				<td><?php echo e($product['name']); ?></td>
 				<td><?php echo e($product['price']); ?></td>
 				<td><?php echo e($product['quantity']); ?></td>
 				<td>
 				    <form action="<?php echo e(route('cart_update',$product['id'])); ?>" method="post">
 				    	<?php echo csrf_field(); ?>
 					      <input type="number" name="qty" value="<?php echo e($product['quantity']); ?>">
 					      <button class="btn btn-secondary btn-sm" type="submit">
 						<i class="fas fa-sync"></i>Update
 					      </button>
 				    </form>
 				</td>
 				<td>
 					<form action="<?php echo e(route('cart_remove')); ?>" method="post">
 						<?php echo csrf_field(); ?>
 						<input type="hidden" name="id" value="<?php echo e($product['id']); ?>">
 						<button class="btn btn-danger" type="submit">Remove</button>
 					</form>
 				</td>
 			</tr>
 		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 		</tbody>
 	</table>
 	 	<hr>
 	<div class="card-footer">
 		<a href="<?php echo e(route('main')); ?>" class="btn btn-warning" >Continue Shopping</a>
 		<span style="margin-left:300px;">Total Price : <?php echo e($cart->total_price); ?></span>
 		<a href="<?php echo e(route('checkout',$cart->total_price)); ?>" class="btn btn-info float-right">Checkout</a>
 	</div>
 	<?php else: ?>
       <p class="text-center">No Items In Cart <a class="btn btn-primary btn-lg" href="<?php echo e(route('main')); ?>">Contiune Shopping</a> </p>
 	<?php endif; ?>

 </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel_projects\laptops\resources\views/cart.blade.php ENDPATH**/ ?>