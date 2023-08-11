

<?php $__env->startSection('content'); ?>

<div class="col-lg-6">
              <!-- Form Basic -->
             
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">New Slider Image</h6>
                </div>
                <div class="card-body">
                  
                  <form action="<?php echo e(route('slider.store')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?> 
                    <div class="form-group">
                     <label>Photo:</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="customFile" name="image"> 
                        <label class="custom-file-label" for="customFile">Choose Slider Image</label>
                      </div>
                      <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>

  </div>                 

  <div class="col-lg-6">
  	<div class="table-responsive">
  		<table class="table table-hover table-bordered">
  		  <thead>
  		  	<th>Image</th>
  		  	<th>#</th>
  		  </thead>
  		  <tbody>
  		  	<?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  		  	  <tr>
  		  	  	<td>
  		  	  		<img src="<?php echo e(Storage::url($slider->image)); ?>" width="160"/>
  		  	  	</td>
  		  	  	<td>
  		  	  		<form onsubmit="return confirmDelete();" method="post" action="<?php echo e(route('slider.destroy',$slider->id)); ?>" style="display:inline-block;">
  		  	  			<?php echo e(method_field('DELETE')); ?>

  		  	  			<?php echo csrf_field(); ?>
  		  	  			<input type="hidden" name="id" value="<?php echo e($slider->id); ?>">
  		  	  			<button type="submit" class="btn btn-danger">
  		  	  		        <i class="fas fa-trash"></i>
  		  	  	        </button>
  		  	  		</form>
  		  	  	</td>
  		  	  </tr>
  		  	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  		  </tbody>
     	</table>
  	</div>
  	
  </div>
   


<script type="text/javascript">
	function confirmDelete()
	{
		if(confirm('will delete slider Image ??'))
		{
			return true;
		}
		else{
			return false;
		}
	}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel_projects\laptops\resources\views/admin/slider.blade.php ENDPATH**/ ?>