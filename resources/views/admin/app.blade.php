<!DOCTYPE html>
<html lang="ar">
  
  <head>
  	   @include('admin/admin_header')
       <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>

<style type="text/css">
  .pointer-events-none{
    z-index: 8888 !important;
  }
</style>
<body id="page-top">

<div id="wrapper">
  

@include('admin/sidebar')

<div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        @include('admin/topnav')
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> @yield('page_sub_title','dashboard')</h1>
            @yield('bread','dashboard')
          </div>

          <div class="row mb-3">

            @yield('content')
                    
          </div>

        </div>
        <!--- end Container Fluid-->
  
      </div>

    

      @include('admin/admin_footer')

        @yield('script')

</div>

</div>