<!DOCTYPE html>
<html lang="ar">
  
  <head>
  	   <?php echo $__env->make('admin/admin_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
       <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  </head>

<style type="text/css">
  .pointer-events-none{
    z-index: 8888 !important;
  }
</style>
<body id="page-top">

<div id="wrapper">
  

<?php echo $__env->make('admin/sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <?php echo $__env->make('admin/topnav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> <?php echo $__env->yieldContent('page_sub_title','dashboard'); ?></h1>
            <?php echo $__env->yieldContent('bread','dashboard'); ?>
          </div>

          <div class="row mb-3">

            <?php echo $__env->yieldContent('content'); ?>
                    
          </div>

        </div>
        <!--- end Container Fluid-->
  
      </div>

    

      <?php echo $__env->make('admin/admin_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->yieldContent('script'); ?>

</div>

</div><?php /**PATH D:\laravel_projects\laptops\resources\views/admin/app.blade.php ENDPATH**/ ?>