<?php
include('Config.php');
CheckLogin();
?>
<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="utf-8">
    <link href="https://cdn.icon-icons.com/icons2/1852/PNG/512/iconfinder-cloudserver-4417106_116641.png" rel="shortcut icon">
    <meta property="og:image" content="https://cdn.icon-icons.com/icons2/1852/PNG/512/iconfinder-cloudserver-4417106_116641.png">
    <link rel="icon" type="image/png" href="https://cdn.icon-icons.com/icons2/1852/PNG/512/iconfinder-cloudserver-4417106_116641.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Tạo Website Giá Rẻ,Mua Hosting Giá Rẻ Chỉ Từ 2k,Nạp Tiền Auto">
    <meta name="keywords" content="Cách tạo shop game,website Giá Rẻ,hosting giá rẻ,CYBERLUX.VN,CYBERLUX.VN,CYBERLUX">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://<?=$_SERVER['SERVER_NAME'];?>">
    <meta name="author" content="topcloudvn.net">
    <link rel="stylesheet" href="/dist/css/app.css" />

</head>

<script>
toastr.options = {
  "closeButton": true,
  "debug": true,
  "newestOnTop": true,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
</script>

    <body class="py-5">
<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="/" class="flex mr-auto">
            <img alt="Logo" class="w-6" src="https://i.imgur.com/z93gpTq.png">
        </a>
        <a href="javascript:;" class="mobile-menu-toggler">
            <i data-lucide="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i>
        </a>
    </div>
    <div class="scrollable">
        <a href="javascript:;" class="mobile-menu-toggler">
            <i data-lucide="x-circle" class="w-8 h-8 text-white transform -rotate-90"></i>
        </a>
        <ul class="scrollable__content py-2">
            
                    <li>
                    <a href="/" class="menu">
                    <div class="menu__icon">
                    <i data-lucide="home"></i>
                    </div>
                    <div class="menu__title">
                     Trang Chủ
                    <i data-lucide="chevron-down" class="menu__sub-icon transform rotate-180"></i>
                    </div>
                    </a>
                    </li>
            
            
              <li>
                    <a href="javascript:;" class="menu">
                    <div class="menu__icon">
                    <i data-lucide="shopping-bag"></i>
                    </div>
                    <div class="menu__title">
                     Tạo Trang Web
                    <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                    </div>
                    </a>
                    
                    <ul class="">
                    <li>
                    <a href="/tao-trang-web" class="menu menu--active">
                    <div class="menu__icon">
                    <i data-lucide="activity"></i>
                    </div>
                    <div class="menu__title">
                     Tạo Trang Web
                                        </div>
                    </a>
                        </li>
                    <li>
                    <a href="/quan-ly-web" class="menu menu--active">
                    <div class="menu__icon">
                    <i data-lucide="activity"></i>
                    </div>
                    <div class="menu__title">
                      Quản Lý Web
                                        </div>
                    </a>
                        </li>
                    </ul>
                    
                    
                    
                    </li>
                    
                    
                    
                    <li>
                    <a href="javascript:;" class="menu">
                    <div class="menu__icon">
                    <i data-lucide="activity"></i>
                    </div>
                    <div class="menu__title">
                     Mua Hosting
                    <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                    </div>
                    </a>
                    <ul class="">
                    <li>
                    <a href="/cpanels" class="menu">
                    <div class="menu__icon">
                    <i data-lucide="activity"></i>
                    </div>
                    <div class="menu__title">
                     Mua Hosting
                                        </div>
                    </a>
                        </li>
                    <li>
                    <a href="/quan-ly-hosting" class="menu">
                    <div class="menu__icon">
                    <i data-lucide="activity"></i>
                    </div>
                    <div class="menu__title">
                     Quản Lý Hosting
                                        </div>
                    </a>
                        </li>
                    </ul>
                    
                    
                    </li>
                        <li>
                    <a href="javascript:;" class="menu">
                    <div class="menu__icon">
                    <i data-lucide="inbox"></i>
                    </div>
                    <div class="menu__title">
                     Nạp Tiền
                    <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                    </div>
                    </a>
                    
                    <ul class="">
                    <li>
                    <a href="/napcard" class="menu menu--active">
                    <div class="menu__icon">
                        <i data-lucide="credit-card"></i>
                   
                    </div>
                    <div class="menu__title">
                     Nạp Thẻ Cào (Tự động)
                                        </div>
                    </a>
                        </li>
                    <li>
                    <a href="/napbank" class="menu menu--active">
                    <div class="menu__icon">
                    <i data-lucide="credit-card"></i>
                    </div>
                    <div class="menu__title">
                      Nạp Ví ATM/MOMO
                                        </div>
                    </a>
                        </li>
                    </ul>
                    
                    
                    
                    </li>
                    
                    <li>
                    <a href="javascript:;" class="menu">
                    <div class="menu__icon">
                    <i data-lucide="headphones"></i>
                    </div>
                    <div class="menu__title">
                     Hỗ Trợ
                    <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                    </div>
                    </a>
                    <ul class="">
                    <li>
                    <a href="//m.facebook.com/minhphaat" class="menu">
                    <div class="menu__icon">
                    <i data-lucide="activity"></i>
                    </div>
                    <div class="menu__title">
                       Facebook
                                        </div>
                    </a>
                        </li>
<li>
                    <a href="//zalo.me/Taminhphat9569" class="menu">
                    <div class="menu__icon">
                    <i data-lucide="activity"></i>
                    </div>
                    <div class="menu__title">
                       Zalo
                                        </div>
                    </a>
                        </li>
                        <li>
                    <a href="//www.youtube.com/@TaMinhPhat" class="menu">
                    <div class="menu__icon">
                    <i data-lucide="activity"></i>
                    </div>
                    <div class="menu__title">
                       Youtube
                                        </div>
                    </a>
                        </li>
                       
                        <li>
                    <a href="/publisher" class="menu">
                    <div class="menu__icon">
                    <i data-lucide="activity"></i>
                    </div>
                    <div class="menu__title">
                       Profile Admin
                                        </div>
                    </a>
                        </li>
                    </ul>
                    
                    
                    </li>
                    
                
                    </div>
                    </div>
                    
                    
                    <div class="flex mt-[4.7rem] md:mt-0">
                    <nav class="side-nav">
                    <a href="/" class="intro-x flex items-center pl-5 pt-4">
                    <img alt="MinhPhat" class="w-6" src="https://arcone.left4code.com/dist/images/logo.svg">
                    <span class="hidden xl:block text-white text-lg ml-3">
                     <?=NameWeb();?>
                    </span>
                    </a>
                    <div class="side-nav__devider my-6"></div>
                    <ul>
                    <li>
                    <a href="/" class="side-menu">
                    <div class="side-menu__icon">
                    <i data-lucide="home"></i>
                    </div>
                    <div class="side-menu__title">
                     Trang Chủ
                        <div class="side-menu__sub-icon transform rotate-180">
                    </div>
                    </div>
                    </a>
                    </li>
                    
             <li>
                    <a href="javascript:;" class="side-menu">
                    <div class="side-menu__icon">
                    <i data-lucide="shopping-bag"></i>
                    </div>
                    <div class="side-menu__title">
                    Tạo Trang Web
                    <div class="side-menu__sub-icon ">
                    <i data-lucide="chevron-down"></i>
                    </div>
                    </div>
                    </a>
                    <ul class="">
                    <li>
                    <a href="/tao-trang-web" class="side-menu">
                    <div class="side-menu__icon">
                    <i data-lucide="activity"></i>
                    </div>
                    <div class="side-menu__title">
                    Tạo Trang Web
                    </div>
                    </a>
                    </li>
                    <li>
                    <a href="/quan-ly-web" class="side-menu">
                    <div class="side-menu__icon">
                    <i data-lucide="activity"></i>
                    </div>
                    <div class="side-menu__title">
                    Quản Lý Web
                    </div>
                    </a>
                    </li>
                    </ul>
                    </li>
                    
                    
                    <li>
                    <a href="javascript:;" class="side-menu">
                    <div class="side-menu__icon">
                    <i data-lucide="shopping-bag"></i>
                    </div>
                    <div class="side-menu__title">
                    Mua Hosting
                    <div class="side-menu__sub-icon ">
                    <i data-lucide="chevron-down"></i>
                    </div>
                    </div>
                    </a>
                    <ul class="">
                    <li>
                    <a href="/cpanels" class="side-menu">
                    <div class="side-menu__icon">
                    <i data-lucide="activity"></i>
                    </div>
                    <div class="side-menu__title">
                    Mua Hosting
                    </div>
                    </a>
                    </li>
                    <li>
                    <a href="/quan-ly-hosting" class="side-menu">
                    <div class="side-menu__icon">
                    <i data-lucide="activity"></i>
                    </div>
                    <div class="side-menu__title">
                    Quản Lý Hosting
                    </div>
                    </a>
                    </li>

                    </ul>
                    </li>
                    
                    
                    <li>
                    <a href="/napcard" class="side-menu">
                    <div class="side-menu__icon">
                    <i data-lucide="inbox"></i>
                    </div>
                    <div class="side-menu__title">
                    Nạp Thẻ Cào
                    </div>
                    </a>
                    </li>
                    <li>
                    <a href="/napbank" class="side-menu">
                    <div class="side-menu__icon">
                    <i data-lucide="credit-card"></i>
                    </div>
                    <div class="side-menu__title">
                    Nạp Ví/ Ngân Hàng
                    </div>
                    </a>
                    </li>
                    <li>
                    <a href="javascript:;" class="side-menu">
                    <div class="side-menu__icon">
                    <i data-lucide="headphones"></i>
                    </div>
                    <div class="side-menu__title">
                     Hỗ Trợ
                    <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                    </div>
                    </a>
                    <ul class="">
                    <li>
                    <a href="/" class="side-menu">
                    <div class="side-menu__icon">
                    <i data-lucide="activity"></i>
                    </div>
                    <div class="side-menu__title">
                     Hosting
                                        </div>
                    </a>
                        </li>
               
                    </ul>
                    
                    
                    </li>
                    </nav>
                    
        <div class="content">
        
        <div class="top-bar">
            <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Application</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
            
    <div class="intro-x relative mr-3 sm:mr-6">
        <div class="search hidden sm:block">
            <input type="text" class="search__input form-control border-transparent" placeholder="Search...">
            <i data-lucide="search" class="search__icon dark:text-slate-500"></i>
        </div>
        <a class="notification sm:hidden" href="#">
            <i data-lucide="search" class="notification__icon dark:text-slate-500"></i>
        </a>
        <div class="search-result">
            <div class="search-result__content">
                <div class="search-result__content__title">Pages</div>
         
            </div>
        </div>
    </div>


    <div class="intro-x dropdown mr-auto sm:mr-6">
        <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button" aria-expanded="false" data-tw-toggle="dropdown">
            <i data-lucide="bell" class="notification__icon dark:text-slate-500"></i>
        </div>
    </div>
    
    <div class="intro-x dropdown w-8 h-8">
        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false" data-tw-toggle="dropdown">
            <img alt="Profile" src="/media/avatar.jpg">
        </div>
        <div class="dropdown-menu w-56">
            <ul class="dropdown-content bg-primary text-white">
                <li class="p-2">
                    <div class="font-medium"> <?=inHoaString($getUser['username']);?> </div>
                    <div class="text-xs text-white/70 mt-0.5 dark:text-slate-500"> Số Dư: <?=Monney($getUser['monney']);?> <sup>đ</sup></div>
                </li>
                <li><hr class="dropdown-divider border-white/[0.08]"></li>
                <li>
                    <a href="/profile" class="dropdown-item hover:bg-white/5">
                        <i data-lucide="user" class="w-4 h-4 mr-2"></i> Trang Cá Nhân
                    </a>
                </li>
               
                <li>
                    <a href="/profile" class="dropdown-item hover:bg-white/5">
                        <i data-lucide="lock" class="w-4 h-4 mr-2"></i> Đổi Mật Khẩu
                    </a>
                </li>

                <li><hr class="dropdown-divider border-white/[0.08]"></li>
                <li>
                    <a href="/dangxuat" class="dropdown-item hover:bg-white/5">
                        <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Đăng Xuất
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
