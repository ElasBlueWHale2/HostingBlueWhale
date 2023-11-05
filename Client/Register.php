<?php
include('../System/Config.php');

if(isset($_POST['submit'])){
    $username = AntiXss($_POST['username']);
    $email = AntiXss($_POST['email']);
    $password = AntiXss($_POST['password']);
    $checkLimit = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM Users WHERE username = '$username' AND password = '".md5($password)."'"));
    
    if(empty($username)){
        $status = swal('Vui Lòng Nhập Tên Đăng Nhập', 'error');
    } else if(empty($password)){
        $status = swal('Vui Lòng Nhập Mật Khẩu', 'error');
    } else if(empty($email)){
        $status = swal('Vui Lòng Nhập Email', 'error');
    } else if($checkLimit >= 1){
        $status = swal('Thông Tin Đăng Ký Đã Tồn Tại!', 'error');
    } else if($checkLimit == 0){
        $inTrue = mysqli_query($connect, "INSERT INTO `Users`(`id`, `username`, `password`, `email`, `monney`, `band`, `time`, `avatar`) VALUES (NULL,'$username','".md5($password)."','$email','0','0','".time()."', '/media/avatar.jpg')");
        if($inTrue){
        $status = swal('Đăng Ký Thành Công!', 'success');
        $_SESSION['users'] = $username;
        $status = redirect('/');
        } else {
            $status = swal('Lỗi Lưu Dữ Liệu!', 'error');
        }
    } 
        
}
?>

<!DOCTYPE html>
<html lang="en" class="dark theme-1">
<head>

    <meta charset="utf-8">
    <link href="https://arcone.left4code.com/dist/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Cách tạo shop game, hosting giá rẻ, tên miền giá rẻ">
    <meta name="keywords" content="Cách tạo shop game, hosting giá rẻ, tên miền giá rẻ">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <meta name="author" content="TOPCLOUDVN.NET">
    <link rel="stylesheet" href="/dist/css/app.css" />
    <title> Đăng Ký Tài Khoản </title>
</head>

    <body class="login">
            <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="" class="-intro-x flex items-center pt-5">
                    <img alt="Midone - HTML Admin Template" class="w-6" src="https://arcone.left4code.com/dist/images/logo.svg">
                    <span class="text-white text-lg ml-3">
                        <?=NameWeb();?>
                    </span>
                </a>
                <div class="my-auto">
                    <img alt="Midone - HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="https://rubick.left4code.com/dist/images/illustration.svg">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10"> Đăng Ký Tài Khoản </div>
                    <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400"> Đăng Ký Tài Khoản Mới Để Tiếp Tục.</div>
                </div>
            </div>
            
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left"> Đăng Ký </h2>
                    <div class="intro-x mt-2 text-slate-400 xl:hidden text-center"> Đăng Ký Tài Khoản Mới Để Tiếp Tục.  </div>
                     <form action method="post"> 
                    <div class="intro-x mt-8">
                        <input type="email" name="email" class="intro-x login__input form-control py-3 px-4 block" placeholder="email@gmail.com" autocomplete="off" required>
                        <input type="text" name="username" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Tên Đăng Nhập" autocomplete="off" required>
                        <input type="password" name="password" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Mật Khẩu" autocomplete="off" required>
                    </div>
                    <div class="intro-x flex text-slate-600 dark:text-slate-500 text-xs sm:text-sm mt-4">
                        <div class="flex items-center mr-auto">
                            <input id="remember-me" type="checkbox" class="form-check-input border mr-2">
                            <label class="cursor-pointer select-none" for="remember-me">Remember me</label>
                        </div>
                        <a href="">Forgot Password?</a>
                    </div>
                    <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                        <button type="submit" name="submit" class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top"> Đăng Ký </button>
                        <a onclick="window.location.href='/login';" class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top"> Đăng Nhập </a>
                    </div>
                    
                   </form>
                    <div class="intro-x mt-10 xl:mt-24 text-slate-600 dark:text-slate-500 text-center xl:text-left">
                        By signin up, you agree to our <a class="text-primary dark:text-slate-200" href="">Terms and Conditions</a> & <a class="text-primary dark:text-slate-200" href="">Privacy Policy</a>
                    </div>
                </div>
            </div>
          
        </div>
    </div>
  
  <?php
  include('../System/Footer.php');
  ?>