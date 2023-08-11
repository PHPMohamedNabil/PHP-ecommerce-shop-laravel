<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo e(route('admin_home')); ?>">
        <div class="sidebar-brand-text mx-3"><?php echo e(config('app.name', 'Laravel')); ?></div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo e(route('admin_home')); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap" aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Category</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Categories</h6>
            <a class="collapse-item" href="<?php echo e(route('category.create')); ?>">New Category</a>
            <a class="collapse-item" href="<?php echo e(route('category.index')); ?>">Categories</a>
          </div>

        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#subCategory" aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Sub Category</span>
        </a>
        <div id="subCategory" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Sub Categories</h6>
            <a class="collapse-item" href="<?php echo e(route('subCategory.create')); ?>">New subCategory</a>
            <a class="collapse-item" href="<?php echo e(route('subCategory.index')); ?>">subCategories</a>
          </div>

        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#product" aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Products</span>
        </a>
        <div id="product" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Products</h6>
            <a class="collapse-item" href="<?php echo e(route('product.create')); ?>">New Product</a>
            <a class="collapse-item" href="<?php echo e(route('product.index')); ?>">Products</a>
          </div>

        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#slider_tap" aria-expanded="true" aria-controls="collapseTable">
          <i class="fas fa-fw fa-table"></i>
          <span>Slider</span>
        </a>
        <div id="slider_tap" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Sliders</h6>
            <a href="<?php echo e(route('slider')); ?>" class="collapse-item" href="simple-tables.html">Create Slider</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true" aria-controls="collapseTable">
          <i class="fas fa-fw fa-users"></i>
          <span>Users</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Users</h6>
            <a class="collapse-item" href="<?php echo e(route('users_all')); ?>">Users</a>
            <a class="collapse-item" href="<?php echo e(route('user_orders')); ?>">Orders</a>
          </div>
        </div>
      </li>
        <hr class="sidebar-divider">
        <li class="nav-item">
         <a class="nav-link" href="<?php echo e(asset('')); ?>">
                Website
         </a>
      </li>
      <li class="nav-item">
         <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
      </li>
      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin">Version 1.1</div>
    </ul><?php /**PATH D:\laravel_projects\laptops\resources\views/admin/sidebar.blade.php ENDPATH**/ ?>