

<?php $__env->startSection('content'); ?>
<style type="text/css">

</style>
<div class="container">
 <main>

  <section class="container-fluid text-center col-md-12 justify-content-center align-items-center">
    <div class="container">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo e($key); ?>" class="<?php echo e($key == 0 ?'active':''); ?>"></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ol>
  <div class="carousel-inner">
    <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="carousel-item <?php echo e($key == 0 ?'active':''); ?>">
      <img src="<?php echo e(Storage::url($slider->image)); ?>" style="width:100%;height:100%"/>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    </div>
  </section>
   <h2 class="text-center p-4 " style="font-size: 22px;">Choose f<span class="border-bottom border-sucess">rom Your</span> Collections</h2>
      <div class="row">
   <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 
        <div class="col-md-4">
            <div class="content">
                <div class="content-overlay">                
                </div>
                        <img class="content-image" src="<?php echo e(Storage::url($cat->img)); ?>">
                    
                    <div class="content-details fadeIn-bottom">
                     <a href="<?php echo e(route('cate_slug',$cat->name)); ?>">    <h3 class="content-title"><?php echo e($cat->name); ?></h3></a>
                        <p class="content-text"><i class="fa fa-map-marker"></i> <?php echo e($cat->slug); ?></p>
                    </div>
                </a>
            </div>
        </div>
    
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
  <div class="album py-5 bg-light">
    <div class="container">
        <h2 class="display-4 border-bottom border-info mb-3" style="width:58%;"><b >Latest Products</b></h2>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
       <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-3">
          <div class="card shadow-sm mb-4">
            <img src="<?php echo e(Storage::url($product->img)); ?>" height="100" style="width:100%" />
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
        <div class="row justify-content-center align-items-center">
          
           <a href="<?php echo e(route('more_products')); ?>" style="display: block;" href="" class="btn btn-success">More Products</a>
        
        </div>
      </div>
    </div>
  </div>
   <div class="container">
      <h2 style="font-size: 20px;">Randoms</h2> 
  <div class="jumbotron">

       <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
     <div class="carousel-item active">
      <div class="row">
         <?php $__currentLoopData = $randomItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-4">
           <div class="card shadow-sm">
            <img src="<?php echo e(Storage::url($product->img)); ?>" width="100%" height="275">
            <div class="card-body">
             <p>
                 <b><?php echo e($product->name); ?></b> 
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
    <div class="carousel-item">
      <div class="row">

      <?php $__currentLoopData = $random_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-4">
             <div class="card shadow-sm">
            <img src="<?php echo e(Storage::url($product->img)); ?>" width="100%" height="275">
            <div class="card-body">
             <p>
                 <b><?php echo e($product->name); ?></b> 
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
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
   </div>
   </div>
</main>
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
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel_projects\laptops\resources\views/product.blade.php ENDPATH**/ ?>