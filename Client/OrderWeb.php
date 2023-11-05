<?php
include('../System/Header.php');
$id = $_GET['id'];
$queryData = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM Template WHERE id = '$id'"));
if($id != $queryData['id']){
    echo redirect('/');
}

if(isset($_POST['thanhtoan'])){
    $domain = $_POST['domain'];
    $domain2 = $_POST['domain2'];
    $tongmien = $domain.'.'.$domain2;
    $taikhoan = $_POST['taikhoan'];
    $matkhau = $_POST['matkhau'];
    $hsd = $_POST['hsd'];
    $querydomain = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM DuoiMien WHERE domain = '$domain2'"));
    $tienphaitra = $queryData['price'] * $hsd + $querydomain['price'];
    $checkLimit = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM DataWeb WHERE domain = '$tongmien'"));
    $timehethan = time()+(2592000 * $hsd);
    
    if(empty($domain)){
        echo swal('Vui Lòng Tên Nhập Miền!','error');
    } else if(empty($domain2) || $domain2 != $querydomain['domain']){
        echo swal('Vui Lòng Chọn Đuôi Miền!','error');
    } else if(empty($taikhoan) || empty($matkhau)){
        echo swal('Vui Lòng Nhập Thông Tin Quản Trị Viên!','error');
    } else if(empty($hsd) || $hsd < 1 || $hsd > 1){
        echo swal('Hạn Sử Dụng Không Hợp Lệ!','error');
    } else if($getUser['monney'] < $tienphaitra){
        echo swal('Không Đủ Tiền Để Thanh Toán!','error');
    } else if($checkLimit >= 1){
        echo swal('Tên Miền Đã Được Sử Dụng','error');
    } else {
        $inTrue = mysqli_query($connect, "INSERT INTO `DataWeb`(`id`, `username`, `domain`, `taikhoan`, `matkhau`, `template`, `status`, `time`, `timeend`) VALUES (NULL,'".$getUser['username']."','$tongmien','$taikhoan','$matkhau','".$queryData['id']."','0','".time()."','$timehethan')");
        if($inTrue){
            mysqli_query($connect, "UPDATE Users SET monney = monney - '$tienphaitra' WHERE username = '".$getUser['username']."'");
            echo swal('Tạo Web Thành Công, Vui Lòng Chờ Duyệt!','success');
            echo redirect('');
        } else {
            echo swal('Tạo Thất Bại!','error');
        }
    }
}

echo Title('Thanh Toán Tạo Web #'.$queryData['name']);
?>

<div class="content">
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
<h2 class="text-lg font-medium mr-auto"> Thanh Toán Tạo Web </h2>
<div class="w-full sm:w-auto flex mt-4 sm:mt-0">
<a href="/tao-trang-web" class="btn btn-primary shadow-md mr-2"> Thay Đổi </a>
</div>
</div>

<div class="intro-y grid grid-cols-12 gap-6 mt-5">
<div class="intro-y col-span-12 md:col-span-6 box">
<div class="h-[320px] before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black/90 before:to-black/10 image-fit">
<img alt="Thummail" class="rounded-t-md" src="<?=$queryData['image'];?>">

<div class="absolute bottom-0 text-white px-5 pb-6 z-10">
<span class="bg-white/20 px-2 py-1 rounded"> Thông Tin </span>
<a href="" class="block font-medium text-xl mt-3"><?=$queryData['name'];?></a>
<p href="" class="block font-medium">Mô Tả: <?=$queryData['description'];?> </p>
</div>
</div>

<div class="p-5 text-slate-600 dark:text-slate-500">


                                    
                                        <div class="mx-6">
                                            <div class="center-mode">
                                                
                                              	<?php
													$topcloud = explode(",", $queryData['images']);
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
<h2 class="font-medium text-base mr-auto"> Nhập Thông Tin Trang Web </h2>
</div>
<div id="vertical-form" class="p-5">
    <form action method="post">
<div class="preview">
<div>
<label for="vertical-form-1" class="form-label"> Nhập Tên Miền </label>
<input id="vertical-form-1" name="domain" type="text" class="form-control" placeholder="Ví dụ - shopabc">
</div>

<div class="mt-3">
<label for="vertical-form-2" class="form-label"> Chọn Đuôi Miền </label>
<select class="form-control" name="domain2" id="domain2" onchange="AiMonney()">
    <option value=""> Chọn Đuôi Miền </option>
    <?php
    $response = mysqli_query($connect, "SELECT * FROM DuoiMien");
    foreach($response as $row){
        ?>
        <option value="<?=$row['domain'];?>">.<?=$row['domain'];?> (<?=number_format($row['price']);?> <sup>đ</sup>) </option>
        <?php
    }
    ?>
</select>
</div>


<div class="mt-3">
<label for="vertical-form-2" class="form-label"> Tài Khoản Admin </label>
<input id="vertical-form-2" type="text" name="taikhoan" class="form-control" placeholder="Nhập tài khoản Admin">
</div>

<div class="mt-3">
<label for="vertical-form-2" class="form-label"> Mật Khẩu </label>
<input id="vertical-form-2" type="text" name="matkhau" class="form-control" placeholder="Nhập mật khẩu Admin">
</div>

<div class="mt-3">
<label for="vertical-form-2" class="form-label"> Hạn Sử Dụng </label>
<select class="form-control" name="hsd" id="hsd" onchange="AiMonney()">
    <option value="0"> Chọn hạn dùng </option>
    <option value="1"> 1 Tháng </option>
    <option value="3"> 3 Tháng </option>
    <option value="6"> 6 Tháng </option>
    <option value="9"> 9 Tháng </option>
    <option value="12"> 12 Tháng </option>
</select>
</div>



<div class="form-check mt-5">
<input id="vertical-form-3" class="form-check-input" type="checkbox" value="">
<label class="form-check-label" for="vertical-form-3"></label>
</div>
<button class="btn btn-primary mt-5" type="submit" name="thanhtoan"> Tạo Ngay -&nbsp;<div id="price">0</div> <sup>đ</sup></button>
</div>
</form>
</div>
</div>

</div>
</div>


    <script>
    function AiMonney(){
        const domain = document.getElementById('domain2').value;
        
           <?php
    $response = mysqli_query($connect, "SELECT * FROM DuoiMien");
    foreach($response as $row){
        ?>
        
         if(domain == '<?=$row['domain'];?>'){
            domainprice = <?=$row['price'];?>;
         } else 
         
        <?php
    }
    ?>
      
    { 
        domainprice = 0;
    }
        
        const hsd = document.getElementById('hsd').value;
        const price = '<?=$queryData['price'];?>';
        
        let tongtien = price * hsd + domainprice;
        let vndString = tongtien.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' }); 
        let nguyenthanh = vndString.replace('₫', ''); 
        document.getElementById('price').innerHTML = nguyenthanh;
    }
</script>

<?php
include('../System/Footer.php');
?>