

<?php $__env->startSection('content'); ?>

 <div class="album py-5 bg-light">
    <div class="container">
        <h2>Products</h2>

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
       <div class="col-md-2">
          <form action="<?php echo e(route('cate_slug',$name)); ?>" method="GET">
             <?php $__currentLoopData = $sub_cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p>
                  <?php echo e($sub->name); ?>

                  <input type="checkbox" name="subcategory[]" value="<?php echo e($sub->id); ?>" <?php if(isset($filter)): ?> 
                     <?php echo e(in_array($sub->id,$filter) ? 'checked':''); ?> 
                  <?php endif; ?>/>
                  
                </p>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             <input type="submit" value="Filter" class="btn btn-success">
          </form>
          <hr>
          <h4>Filter By Price</h4>
          <form action="<?php echo e(route('cate_slug',$name)); ?>" method="GET">
            
                  <input type="hidden" name="category_id" value="<?php echo e($category_id); ?>" />
                  <input type="text" name="min" class="form-control" placeholder="Minimum Price" required=""/>
                  <br>
                  <input type="text" name="max" class="form-control" placeholder="maximum price" required="" /> 
                  
                  
             <input type="submit" value="Filter" class="btn btn-success">
          </form>
          <hr>
          <a href="<?php echo e(route('cate_slug',$name)); ?>">Back</a>
        </div>
        <div class="col-md-10">
           <div class="row">
             
       <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4">
          <div class="card shadow-sm mb-4">
            <img src="<?php echo e(Storage::url($product->img)); ?>" style="width:100%;" height="200">
            <div class="card-body">
             <p>
                 <b><?php echo e(substr($product->name,0,50)); ?></b> 
             </p>
             <p class="card-text">
                 <?php echo e(substr($product->description,0,150)); ?> ...
              </p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="<?php echo e(route('product_show',$product->id)); ?>" class="btn btn-sm btn-outline-secondary">
                        View
                    </a>
                  <a href="<?php echo e(route('add_to_cart',$product->id)); ?>" class="btn btn-sm btn-outline-secondary">Add to Cart</a>
                </div>
                <small class="text-muted"><?php echo e($product->price); ?> L.E</small>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           </div>
        </div>
          </div>
        </div>
      </div>

<footer class="text-muted py-5 text-white bg-info">
  <div class="container-fluid text-white">
    <div class="row text-white">
        <div class="col-md-8 text-white">
           
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1">Copy Right © ClothesShop 2022, but please download and customize it for yourself!</p>
    <p class="mb-0">Call us phone Number? <a href="#contact" id="contact">+02568988845</a> or Email at <a href="mailto:clothesshop@gmail.com">clothesshop@gmail.com</a></p> 
        </div>
        <div class="col-md-4">
            <ul style="display: inline-block;">
               <li  style="display: inline-block;">Shope</li>
               <li  style="display: inline-block;">Categories</li>
               <li  style="display: inline-block;">About</li>
            </ul>
        </div>
    </div>
    
  </div>

</footer>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel_projects\laptops\resources\views/product_category.blade.php ENDPATH**/ ?>