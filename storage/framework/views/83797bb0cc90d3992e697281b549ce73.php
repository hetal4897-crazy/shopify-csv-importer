<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
   <head>
      <meta charset="utf-8" />
      <title><?php echo $__env->yieldContent('title'); ?></title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
      <meta content="Hetal Jogadiya" name="author" />
      <!-- App favicon -->
      <link rel="shortcut icon" href="<?php echo e(asset('theme/assets/images/favicon.ico')); ?>">
      <!-- jsvectormap css -->
      <link href="<?php echo e(asset('theme/assets/libs/jsvectormap/jsvectormap.min.css')); ?>" rel="stylesheet" type="text/css" />
      <!--Swiper slider css-->
      <link href="<?php echo e(asset('theme/assets/libs/swiper/swiper-bundle.min.css')); ?>" rel="stylesheet" type="text/css" />
      <!-- Layout config Js -->
      <script src="<?php echo e(asset('theme/assets/js/layout.js')); ?>"></script>
      <!-- Bootstrap Css -->
      <link href="<?php echo e(asset('theme/assets/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
      <!-- Icons Css -->
      <link href="<?php echo e(asset('theme/assets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
      <!-- App Css-->
      <link href="<?php echo e(asset('theme/assets/css/app.min.css')); ?>" rel="stylesheet" type="text/css" />
      <!-- custom Css-->
      <link href="<?php echo e(asset('theme/assets/css/custom.min.css')); ?>" rel="stylesheet" type="text/css" />
       <link rel="stylesheet" href="//cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
        <link rel="stylesheet" href="<?php echo e(asset('theme/assets/1.11.5/css/dataTables.bootstrap5.min.css')); ?>" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="<?php echo e(asset('theme/assets/responsive/2.2.9/css/responsive.bootstrap.min.css')); ?>" />

    <link rel="stylesheet" href="<?php echo e(asset('theme/assets/buttons/2.2.2/css/buttons.dataTables.min.css')); ?>">
   </head>
   <body>
      <!-- Begin page -->
      <div id="layout-wrapper">
         <header id="page-topbar">
            <div class="layout-width">
               <div class="navbar-header">
                  <div class="d-flex">
                     <!-- LOGO -->
                     <div class="navbar-brand-box horizontal-logo">
                        <a href="#" class="logo logo-dark">
                        <span class="logo-sm">
                        <img src="<?php echo e(asset('theme/assets/images/logo-sm.png')); ?>" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                        <img src="<?php echo e(asset('theme/assets/images/logo-dark.png')); ?>" alt="" height="17">
                        </span>
                        </a>
                        <a href="#" class="logo logo-light">
                        <span class="logo-sm">
                        <img src="<?php echo e(asset('theme/assets/images/logo-sm.png')); ?>" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                        <img src="<?php echo e(asset('theme/assets/images/logo-light.png')); ?>" alt="" height="17">
                        </span>
                        </a>
                     </div>
                     <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                     <span class="hamburger-icon">
                     <span></span>
                     <span></span>
                     <span></span>
                     </span>
                     </button>
                     
                  </div>
                  
               </div>
            </div>
         </header>
        
         <!-- ========== App Menu ========== -->
         <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
               <!-- Dark Logo-->
               <a href="#" class="logo logo-dark">
               <span class="logo-sm">
               <img src="<?php echo e(asset('theme/assets/images/logo-sm.png')); ?>" alt="" height="22">
               </span>
               <span class="logo-lg">
               <img src="<?php echo e(asset('theme/assets/images/logo-dark.png')); ?>" alt="" height="17">
               </span>
               </a>
               <!-- Light Logo-->
               <a href="#" class="logo logo-light">
               <span class="logo-sm">
               <img src="<?php echo e(asset('theme/assets/images/logo-sm.png')); ?>" alt="" height="22">
               </span>
               <span class="logo-lg">
               <img src="<?php echo e(asset('theme/assets/images/logo-light.png')); ?>" alt="" height="17">
               </span>
               </a>
               <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
               <i class="ri-record-circle-line"></i>
               </button>
            </div>
            <div id="scrollbar">
               <div class="container-fluid">
                  <div id="two-column-menu">
                  </div>
                  <ul class="navbar-nav" id="navbar-nav">
                     <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                    
                     <li class="nav-item">
                        <a class="nav-link menu-link <?php echo e(request()->routeIs('upload') ? 'active' : ''); ?>" href="<?php echo e(route('upload')); ?>">
                        <i class=" ri-file-upload-line"></i> <span data-key="t-widgets">Upload File</span>
                        </a>
                     </li>

                     <li class="nav-item">
                        <a class="nav-link menu-link <?php echo e(request()->routeIs('product-list') ? 'active' : ''); ?>" href="<?php echo e(route('product-list')); ?>">
                        <i class="ri-bubble-chart-fill"></i> <span data-key="t-widgets">Product List</span>
                        </a>
                     </li>

                     <li class="nav-item">
                        <a class="nav-link menu-link <?php echo e(request()->routeIs('file-list') ? 'active' : ''); ?>" href="<?php echo e(route('file-list')); ?>">
                        <i class="ri-booklet-fill"></i> <span data-key="t-widgets">File History</span>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link menu-link <?php echo e(request()->routeIs('logs') ? 'active' : ''); ?>" href="<?php echo e(route('logs')); ?>">
                        <i class="ri-honour-line"></i> <span data-key="t-widgets">Logs</span>
                        </a>
                     </li>
                    
                  </ul>
               </div>
               <!-- Sidebar -->
            </div>
            <div class="sidebar-background"></div>
         </div>
         <!-- Left Sidebar End -->
         <!-- Vertical Overlay-->
         <div class="vertical-overlay"></div>
        
         <div class="main-content">
            <div class="page-content">
               <div class="container-fluid">
                  <div class="row">
                     <?php echo $__env->yieldContent('content'); ?>
                  </div>
               </div>
               <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <footer class="footer">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script> 
                     </div>
                     <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                           Design & Develop by Hetal Jogadiya
                        </div>
                     </div>
                  </div>
               </div>
            </footer>
         </div>
         <!-- end main content-->
      </div>
      <!-- END layout-wrapper -->
      <!--start back-to-top-->
      <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
      <i class="ri-arrow-up-line"></i>
      </button>
      <!--end back-to-top-->
      <!--preloader-->
      <div id="preloader">
         <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
               <span class="visually-hidden">Loading...</span>
            </div>
         </div>
      </div>
      <!-- JAVASCRIPT -->
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

      <script src="<?php echo e(asset('theme/assets/libs/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
      <script src="<?php echo e(asset('theme/assets/libs/simplebar/simplebar.min.js')); ?>"></script>
      <script src="<?php echo e(asset('theme/assets/libs/node-waves/waves.min.js')); ?>"></script>
      <script src="<?php echo e(asset('theme/assets/libs/feather-icons/feather.min.js')); ?>"></script>
      <script src="<?php echo e(asset('theme/assets/js/pages/plugins/lord-icon-2.1.0.js')); ?>"></script>
      <script src="<?php echo e(asset('theme/assets/js/plugins.js')); ?>"></script>
      <!-- apexcharts -->
      <script src="<?php echo e(asset('theme/assets/libs/apexcharts/apexcharts.min.js')); ?>"></script>
      <!-- Vector map-->
      <script src="<?php echo e(asset('theme/assets/libs/jsvectormap/jsvectormap.min.js')); ?>"></script>
      <script src="<?php echo e(asset('theme/assets/libs/jsvectormap/maps/world-merc.js')); ?>"></script>
      <!--Swiper slider js-->
      <script src="<?php echo e(asset('theme/assets/libs/swiper/swiper-bundle.min.js')); ?>"></script>
      <!-- Dashboard init -->
      <script src="<?php echo e(asset('theme/assets/js/pages/dashboard-ecommerce.init.js')); ?>"></script>
      <!-- App js -->
      <script src="<?php echo e(asset('theme/assets/js/app.js')); ?>"></script>

       <script src="//cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        <?php echo Toastr::message(); ?>

      <?php echo $__env->yieldContent('footer'); ?>

       <script src="<?php echo e(asset('theme/assets/1.11.5/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('theme/assets/1.11.5/js/dataTables.bootstrap5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('theme/assets/responsive/2.2.9/js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(asset('theme/assets/buttons/2.2.2/js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('theme/assets/buttons/2.2.2/js/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(asset('theme/assets/buttons/2.2.2/js/buttons.html5.min.js')); ?>"></script>
    

    <script src="<?php echo e(asset('theme/assets/js/pages/datatables.init.js')); ?>"></script>
   </body>
</html><?php /**PATH C:\xampp\htdocs\project\shopify-csv-importer\resources\views/layout/index.blade.php ENDPATH**/ ?>