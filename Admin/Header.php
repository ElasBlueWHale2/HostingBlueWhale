<?php
include('../System/Config.php');
if($level == 'admin' || $level == 'ctv'){
    
} else {
    die('bug Cái Đb');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Trang Quản Trị </title>
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="/Admin/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  
  <link rel="stylesheet" href="/Admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
 
  <link rel="stylesheet" href="/Admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  
  <link rel="stylesheet" href="/Admin/plugins/jqvmap/jqvmap.min.css">
  
  <link rel="stylesheet" href="/Admin/dist/css/adminlte.min.css">
  
  <link rel="stylesheet" href="/Admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  
  <link rel="stylesheet" href="/Admin/plugins/daterangepicker/daterangepicker.css">
  
  <link rel="stylesheet" href="/Admin/plugins/summernote/summernote-bs4.min.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="/Admin/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>


  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>


    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>



      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="/Admin/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">

            <div class="media">
              <img src="/Admin/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="/Admin/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  
  
  
  
  
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="./" class="brand-link">
      <img src="/Admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"> CYBERLUX.VN </span>
    </a>


    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/Admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> CYBERLUX.VN </a>
        </div>
      </div>


      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>


    
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            
<?php
if($getUser['level'] == 'admin'){
    ?>
          <li class="nav-item menu-open">
            <a href="./" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                 Dashboards 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          
   
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                 Danh Mục Hosting
                 <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./addserver.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Thêm Máy Chủ </p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="./addpackage.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Thêm Gói Hosting </p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="./quanlyhost.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Quản Lý Hosting </p>
                </a>
              </li>
            </ul>
          </li>
          
          
          
            
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Danh Mục Tạo Shop
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./addtemplate.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Thêm Mẫu Shop </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./quanlyshop.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Quản Lý Shop </p>
                </a>
              </li>
            </ul>
          </li>
          

          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                 Quản Lý Nạp Thẻ
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./listthe.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Danh Sách Thẻ </p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="./settingcard.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Cài Đặt </p>
                </a>
              </li>
             
            </ul>
          </li>
          
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Quản Lý Nạp MOMO
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./listmomo.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Danh Sách Nạp </p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="./settingmomo.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Cài Đặt </p>
                </a>
              </li>
            </ul>
          </li>
          
          
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                 Thành Viên
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./contien.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Cộng Tiền </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./listuser.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Danh Sách Thành Viên </p>
                </a>
              </li>
            </ul>
          </li>
          
          
            
              
          <li class="nav-item">
            <a href="./domain.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                 Quản Lý Đuôi Miền
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          
          
          <li class="nav-item">
            <a href="./resetchat.php" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                 Đặt Lại Chat
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          
        </ul>
     
      
<?php
} else if($getUser['level'] == 'ctv'){
    ?>

          
          <li class="nav-item menu-open">
            <a href="./" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                 Dashboards 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Danh Mục Tạo Shop
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./addtemplate.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Thêm Mẫu Shop </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./quanlyshop.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Quản Lý Shop </p>
                </a>
              </li>
            </ul>
          </li>
          
    
    <?php } ?>
     </nav>
      
   
    </div>
  </aside>


