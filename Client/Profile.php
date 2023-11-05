<?php
include('../System/Header.php');
echo Title('Thông Tin Tài Khoản');
?>

<div class="content">
                <div class="intro-y flex items-center mt-5">
                    <div class="quochuy">
                        <h2 class="font-bold text-2xl mr-auto">
                            THÔNG TIN TÀI KHOẢN
                        </h2>
                    </div>
                </div>
                <div class="grid grid-cols-12 gap-6">

                    <div class="col-span-12 lg:col-span-4 2xl:col-span-3 flex lg:block flex-col-reverse">
                        <div class="intro-y box mt-5">
                            <div class="relative flex items-center p-5">
                                <div class="w-12 h-12 image-fit">
                                    <img class="rounded-full" src="<?=$getUser['avatar'];?>">
                                </div>
                                <div class="ml-4 mr-auto">
                                    <div class="font-medium text-base"> <?=inHoaString($getUser['username']);?> </div>
                                </div>
                            </div>
                            <div class="p-5 border-t border-gray-200 dark:border-dark-5">
                                <div>
                                    <label for="update-profile-form-1" class="form-label">Tài khoản</label>
                                    <input type="text" class="form-control" placeholder="Input text" value="<?=AntiXss($getUser['username']);?>" disabled="">
                                </div>
                              
                                <div>
                                    <label for="update-profile-form-1" class="form-label"> Số Dư </label>
                                    <input type="text" class="form-control" placeholder="Input text" value="<?=Monney($getUser['monney']);?>đ" disabled="">
                                </div>
                                
                                
                                <div class="mt-3">
                                    <label for="update-profile-form-7" class="form-label"> Thời Gian Đăng Ký </label>
                                    <input type="text" class="form-control" value="Sử dụng đến: <?=ToTime($getUser['time']);?>" disabled="">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-span-12 lg:col-span-8 2xl:col-span-9">

                        <div class="intro-y box lg:mt-5">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                            <h2 class="font-bold text-2xl mr-auto">
                                Thay Đổi Mật Khẩu
                            </h2>
                        </div>
                            <div class="p-5">
                                <form class="form-horizontal mb-lg" method="post">
                                    <div class="flex flex-col-reverse xl:flex-row flex-col">
                                        <div class="flex-1 mt-6 xl:mt-0">
                                            <div class="grid grid-cols-12 gap-x-5 mt-3">
                                                <div class="col-span-12 2xl:col-span-6">
                                                    <div>
                                                        <label for="update-profile-form-1" class="form-label">Mật
                                                            khẩu mới</label>
                                                        <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-span-12 2xl:col-span-6">
                                                    <div class="mt-3 2xl:mt-0">
                                                        <label for="update-profile-form-1" class="form-label">Nhập lại
                                                            mật khẩu</label>
                                                        <input value="" type="password" name="repassword" class="form-control" placeholder="Nhập lại mật khẩu">
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="mt-3">
                                                <button style="width: 100%" type="submit" name="changepass" class="btn btn-primary w-full">Thay đổi mật khẩu</button>
                                            </div>
                                        </div>

                                        <div class="w-52 mx-auto xl:mr-0 xl:ml-6">
                                            <div class="border-2 border-dashed shadow-sm border-gray-200 dark:border-dark-5 rounded-md p-5">
                                                <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                                    <img class="rounded-md" src="<?=$getUser['avatar'];?>">
                                                    <div class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-theme-24 right-0 top-0 -mr-2 -mt-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x w-4 h-4"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php

if(isset($_POST['changepass'])){
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    if(empty($password) || empty($repassword)){
        echo swal('Mật Khẩu Không Thể Bỏ Trống!','error');
    } else if($password != $repassword){
        echo swal('2 Mật Khẩu Không Giống Nhau!','error');
    } else if(md5($password) == $getUser['password']) {
        echo swal('Mật Khẩu Giống Mật Khẩu Hiện Tại :D','error');
    } else {
        $inTrue = mysqli_query($connect, "UPDATE Users SET password = '".md5($password)."' WHERE username = '".$getUser['username']."'");
        if($inTrue){
            echo swal('Đổi Mật Khẩu Thành Công, Vui Lòng Đăng Nhập Lại!','success');
            echo redirect('/dangxuat');
        } else {
            echo swal('Đổi Mật Khẩu Thất Bại!','error');
        }
    }
}
include('../System/Footer.php');
?>