<?php
include('../System/Header.php');
$id = $_GET['id'];
$queryData = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM DataWeb WHERE id = '$id' AND username = '".$getUser['username']."'"));
$template = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM Template WHERE id = '".$queryData['template']."'"));
if($id != $queryData['id']){
    echo redirect('/');
} else if($queryData['username'] != $getUser['username']){
    echo redirect('/');  
}

echo Title('Quản Lý Trang Web #'.inHoaString($queryData['domain']));
?>



<div class="content">
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
<h2 class="text-lg font-medium mr-auto"> Thông Tin Trang (<?=inHoaString($queryData['domain']);?>) </h2>
</div>

<div class="intro-y grid grid-cols-12 gap-6 mt-5">
<div class="intro-y col-span-12 md:col-span-6 box">
<div class="h-[320px] before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black/90 before:to-black/10 image-fit">
<img alt="Midone - HTML Admin Template" class="rounded-t-md" src="<?=$template['image'];?>">

<div class="absolute bottom-0 text-white px-5 pb-6 z-10">
<span class="bg-white/20 px-2 py-1 rounded"> <?=Monney($template['price']);?> <sup>đ</sup> </span>
<a href="" class="block font-medium text-xl mt-3"> <?=$template['name'];?> </a>
<p href="" class="block font-medium"> Mô Tả: <?=$template['description'];?> </p>
</div>
</div>



<div class="p-5 text-slate-600 dark:text-slate-500">


                                    
                                        <div class="mx-6">
                                            <div class="center-mode">
                                                
                                              	<?php
													$topcloud = explode(",", $template['images']);
													foreach ($topcloud as $images) {
													    $id=+1;
                                                        echo ' <div class="h-32 px-2">
                                                    <div class="h-full bg-slate-100 dark:bg-darkmode-400 rounded-md">
                                                        <h3 class="h-full font-medium flex items-center justify-center text-2xl"><img src="'.$images.'"></h3>
                                                    </div>
                                                </div>';
                                                    }
												    ?>
												    
                                            </div>
                                        </div>
                                    
                                
</div>


</div>

<div class="intro-y col-span-12 md:col-span-6 box">
<div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
<h2 class="font-medium text-base mr-auto"> Thông Tin Đăng Ký </h2>
</div>
<div id="vertical-form" class="p-5">
    <form action="" method="post">
<div class="preview">
<div>
<label for="vertical-form-1" class="form-label"> Tên Miền </label>
<input id="vertical-form-1" name="domain" type="text" class="form-control" placeholder="example.com" value="<?=$queryData['domain'];?>" disabled>
</div>

<div class="mt-3">
<label for="vertical-form-2" class="form-label"> Tài Khoản </label>
<input id="vertical-form-2" type="text" name="taikhoan" class="form-control" placeholder="secret" value="<?=$queryData['taikhoan'];?>" disabled>
</div>

<div class="mt-3">
<label for="vertical-form-2" class="form-label"> Mật Khẩu </label>
<input id="vertical-form-2" type="text" name="matkhau" class="form-control" placeholder="secret" value="<?=$queryData['matkhau'];?>" disabled>
</div>


<div class="mt-3">
<label for="vertical-form-2" class="form-label"> Ngày Hết Hạn </label>
<input id="vertical-form-2" type="text" class="form-control" value="<?=ToTime($queryData['time']);?>" disabled>
</div>

<div class="mt-3">
<label for="vertical-form-2" class="form-label"> Ngày Hết Hạn </label>
<input id="vertical-form-2" type="text" class="form-control" value="<?=ToTime($queryData['timeend']);?>" disabled>
</div>

<div class="form-check mt-5">
<input id="vertical-form-3" class="form-check-input" type="checkbox" value="">
<label class="form-check-label" for="vertical-form-3">Remember me</label>
</div>
<a class="btn btn-pending mt-5" data-tw-toggle="modal" data-tw-target="#giahan"> Gia Hạn </a> <a class="btn btn-danger mt-5" data-tw-toggle="modal" data-tw-target="#delete"> Xóa Dịch Vụ </a>
</div>
</form>
</div>
</div>

</div>
</div>


<div id="delete" class="modal" tabindex="-1" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h2 class="font-medium text-base mr-auto"> Xóa Dịch Vụ </h2>
<div class="dropdown sm:hidden">
<a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown">
<i data-lucide="more-horizontal" class="w-5 h-5 text-slate-500"></i>
</a>
</div>
</div>
<form action method="post">
<div class="modal-body grid grid-cols-12 gap-4 gap-y-3">

<div class="col-span-12 sm:col-span-12">
<label for="modal-form-2" class="form-label"> Mật Khẩu </label>
<input id="modal-form-2" type="password" class="form-control" name="password" placeholder="Mật Khẩu Tài Khoản">
</div>

</div>
<div class="modal-footer">
<button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1"> Hủy </button>
<button type="submit" name="delete" class="btn btn-primary"> Xác Nhận </button>
</div> </form>
</div>
</div>
</div>


<div id="giahan" class="modal" tabindex="-1" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h2 class="font-medium text-base mr-auto"> Gia Hạn Dịch Vụ </h2>
<div class="dropdown sm:hidden">
<a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown">
<i data-lucide="more-horizontal" class="w-5 h-5 text-slate-500"></i>
</a>
</div>
</div>
<form action method="post">
<div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
<div class="col-span-12 sm:col-span-6">
<label for="modal-form-1" class="form-label"> Chọn Thời Gian </label>
<select class="form-control" name="hsd" id="hsd" onclick="AiMonney()">
    <option value="0"> Chọn Thời Gian </option>
    <option value="1"> 1 Tháng </option>
    <option value="3"> 3 Tháng </option>
    <option value="6"> 6 Tháng </option>
    <option value="9"> 9 Tháng </option>
    <option value="12"> 12 Tháng </option>
</select>
</div>


<div class="col-span-12 sm:col-span-6">
<label for="modal-form-2" class="form-label"> Mật Khẩu </label>
<input id="modal-form-2" type="password" class="form-control" name="password" placeholder="Mật Khẩu Tài Khoản">
</div>

</div>
<div class="modal-footer">
<button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1"> Hủy </button>
<button type="submit" name="giahan" class="btn btn-primary"> Gia Hạn -&nbsp;<div id="price">0</div> <sup>đ</sup></button>
</div> </form>
</div>
</div>
</div>

<script>
     function AiMonney(){
                    const hsd = document.getElementById('hsd').value;
                    const price = '<?=$template['price'];?>';
                    
                    let tongtien = price * hsd;
                    let vndString = tongtien.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' }); 
                    let codeflow = vndString.replace('₫', ''); 
                    document.getElementById('price').innerHTML = codeflow;
                    }
</script>

<?php

if(isset($_POST['giahan'])){
    $hsd = $_POST['hsd'];
    $password = md5($_POST['password']);
    $tienphaitra = $template['monney'] * $hsd;
    $timehethan = 2592000 * $hsd;
    $untime = time()+(2592000 * $hsd);
    
    if(empty($hsd) || $hsd < 1 || $hsd > 12){
        echo swal('Hạn Sử Dụng Không Hợp Lệ!','error');
    } else if($password != $getUser['password']){
        echo swal('Mật Khẩu Không Đúng!','error');
    } else if($getUser['monney'] < $tienphaitra) {
        echo swal('Không Đủ Tiền Để Gia Hạn!','error');
    } else if($queryData['status'] == '1' || $queryData['status'] == '0'){
        $inTrue = mysqli_query($connect, "UPDATE DataWeb SET timeend = timeend + $timehethan WHERE id = '".$queryData['id']."'");
        if($inTrue){
            mysqli_query($connect, "UPDATE Users SET monney = monney - $tienphaitra WHERE username = '".$queryData['username']."'");
            echo swal('Gia Hạn Thành Công ('.$hsd.' Tháng) ','success');
        } else {
            echo swal('Gia Hạn Thất Bại!','error');
        }
    } else if($queryData['status'] == '3'){
           $inTrue = mysqli_query($connect, "UPDATE DataWeb SET status = '1', timeend = $untime WHERE id = '".$queryData['id']."'");
        if($inTrue){
            mysqli_query($connect, "UPDATE Users SET monney = monney - $tienphaitra WHERE username = '".$queryData['username']."'");
            echo swal('Gia Hạn Thành Công ('.$hsd.' Tháng) ','success');
            echo redirect('');
        } else {
            echo swal('Gia Hạn Thất Bại!','error');
        }
    } else {
        echo swal('Bạn Chỉ Có Thể Gia Hạn Khi Web Chưa Hết Hạn!','error');
    }
}

if(isset($_POST['delete'])){
    $password = md5($_POST['password']);
    
    if($password != $getUser['password']){
        echo swal('Mật Khẩu Không Đúng!','error');
    } else {
       $inTrue = mysqli_query($connect, "DELETE FROM DataWeb WHERE id = '".$queryData['id']."'");
       if($inTrue){
           echo swal('Xóa Thành Công!','success');
            echo redirect('/quan-ly-web');
       } else {
           echo swal('Xóa Thất Bại!','error');
       }
    }
}
include('../System/Footer.php');
?>