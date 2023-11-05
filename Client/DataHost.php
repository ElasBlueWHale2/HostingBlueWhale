<?php
include('../System/Header.php');
$id = $_GET['id'];
$queryData = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM Hosting WHERE id = '$id' AND username = '".$getUser['username']."'"));
$queryServer = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM ServerHost WHERE maychu = '".$queryData['maychu']."'"));
if($id != $queryData['id']){
    echo redirect('/');
} else if($queryData['username'] != $getUser['username']){
    echo redirect('/');  
}

if(isset($_POST['reset'])){
            $query = $queryServer['hostname'].':2087/json-api/removeacct?api.version=1&user='.$queryData['taikhoan'].'&password='.$queryData['matkhau'].'&enabledigest=0&db_pass_update=1'; 
            $curl = curl_init(); 
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0); 
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,0);
            curl_setopt($curl, CURLOPT_HEADER,0); 
            curl_setopt($curl, CURLOPT_RETURNTRANSFER,1); 
            $header[0] = "Authorization: Basic " . base64_encode($queryServer['whmuser'].":".$queryServer['passwhm']) . "\n\r";
            curl_setopt($curl, CURLOPT_HTTPHEADER, $header);  
            curl_setopt($curl, CURLOPT_URL, $query);
            $result = curl_exec($curl); 
            $result = curl_exec($curl);
            if ($result == false) {
                echo swal($result);
            } else {
                $intrue = mysqli_query($connect, "UPDATE Hosting SET status = '0' WHERE id = '".$queryData['id']."'");
                echo swal('Đang Đợi Hệ Thống Reset!','success');
                echo redirect('');
            }
            curl_close($curl);
    }


if(isset($_POST['nangcap'])){
    $goi = $_POST['package'];
    $password = md5($_POST['password']);
    $querypackage = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM Plans WHERE planapi = '$goi'"));
    if(empty($goi)){
        echo swal('Vui Lòng Chọn Gói','error');
    } else if($password != $getUser['password']){
         echo swal('Sai Mật Khẩu!','error');
    } else if($querypackage['maychu'] != $queryServer['maychu']){
        echo swal('Bạn Không Thể Chuyển Từ Máy Chủ Này Sang Máy Chủ Khác!','error');
    } else if($querypackage['price'] < $queryData['price']){
        echo swal('Bạn Không Thể Đăng Ký Gói Thấp Hơn Gói Hiện Tại!','error');
    } else if($getUser['monney'] < $querypackage['price']){
        echo swal('Bạn Không Đủ Tiền Để Thanh Toán :D','error');
    } else {
        $query = $queryServer['hostname'].':2087/json-api/changepackage?api.version=1&user='.$queryData['taikhoan'].'&pkg='.$queryServer['whmuser'].'_'.$goi.''; 
        $curl = curl_init(); // Create Curl Object 
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0); // Allow self-signed certs 
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,0); // Allow certs that do not match the hostname 
        curl_setopt($curl, CURLOPT_HEADER,0); // Do not include header in output 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,1); 
        $header[0] = "Authorization: Basic " . base64_encode($queryServer['whmuser'].":".$queryServer['passwhm']) . "\n\r";
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header); // set the username and password 
        curl_setopt($curl, CURLOPT_URL, $query); // execute the query 
        $result = curl_exec($curl); 
        $result = curl_exec($curl);
        if ($result == false) {
            echo swal($result);
        } else {
                $intrue = mysqli_query($connect, "UPDATE Hosting SET plan = '$goi', price = '".$querypackage['price']."' WHERE id = '".$queryData['id']."'");
                echo swal('Nâng Cấp Thành Công!','success');
                echo redirect('');
            }
        curl_close($curl);

    }
    
}

if(isset($_POST['resetpass'])){
    if($queryData['status'] == '1'){
            $matkhau = 'topc'.rand(100000,9000000); 
            $query = $queryServer['hostname'].':2087/json-api/passwd?api.version=1&user='.$queryData['taikhoan'].'&password='.$matkhau.'&enabledigest=0&db_pass_update=1'; 
            $curl = curl_init(); 
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0); 
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,0);
            curl_setopt($curl, CURLOPT_HEADER,0); 
            curl_setopt($curl, CURLOPT_RETURNTRANSFER,1); 
            $header[0] = "Authorization: Basic " . base64_encode($queryServer['whmuser'].":".$queryServer['passwhm']) . "\n\r";
            curl_setopt($curl, CURLOPT_HTTPHEADER, $header);  
            curl_setopt($curl, CURLOPT_URL, $query);
            $result = curl_exec($curl); 
            $result = curl_exec($curl);
            if ($result == false) {
                echo swal($result);
            } else {
                $intrue = mysqli_query($connect, "UPDATE Hosting SET matkhau = '$matkhau' WHERE id = '".$queryData['id']."'");
                echo swal('Reset Mật Khẩu Thành Công!','success');
                echo redirect('');
            }
            curl_close($curl);
    } 

}

if(isset($_POST['delete'])){
            $query = $queryServer['hostname'].':2087/json-api/removeacct?api.version=1&user='.$queryData['taikhoan'].'&password='.$queryData['matkhau'].'&enabledigest=0&db_pass_update=1'; 
            $curl = curl_init(); 
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0); 
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,0);
            curl_setopt($curl, CURLOPT_HEADER,0); 
            curl_setopt($curl, CURLOPT_RETURNTRANSFER,1); 
            $header[0] = "Authorization: Basic " . base64_encode($queryServer['whmuser'].":".$queryServer['passwhm']) . "\n\r";
            curl_setopt($curl, CURLOPT_HTTPHEADER, $header);  
            curl_setopt($curl, CURLOPT_URL, $query);
            $result = curl_exec($curl); 
            $result = curl_exec($curl);
            if ($result == false) {
                echo swal($result);
            } else {
                $intrue = mysqli_query($connect, "DELETE FROM Hosting WHERE id = '".$queryData['id']."'");
                echo swal('Xóa Hosting Thành Công!','success');
                echo redirect('/quan-ly-hosting');
            }
            curl_close($curl);
}


if(isset($_POST['giahan'])){
    $password = md5($_POST['password']);
    $hsd = $_POST['hsd'];
    $tienphaitra = $queryData['price'] * $hsd;
    $timedangco = $queryData['time2'];
    $timesapco = 2592000 * $hsd;
    $tongtime = $timedangco + $timesapco;
    $khoiphuctime = time()+(2592000 * $hsd);
    if(empty($hsd) || $hsd < 1 || $hsd > 12){
        echo swal('Hạn Sử Dụng Không Hợp Lệ!', 'error');
    } else if($password != $getUser['password']){
        echo swal('Mật Khẩu Không Đúng', 'error');
    } else if($getUser['monney'] < $tienphaitra){
        echo swal('Không Đủ Số Dư Để Thanh Toán!', 'error');
    } else {
        
        if($queryData['status'] == '1'){
            
            $inTrue = mysqli_query($connect, "UPDATE Hosting SET hsd = '$tongtime' WHERE id = '$id'");
            if($inTrue){
                echo swal('Gia Hạn Thành Công Cho Hosting (#'.inHoaString($queryData['domain']).') ','success');
                mysqli_query($connect, "UPDATE Users SET monney = monney - $tienphaitra WHERE username = '".$getUser['username']."'");
                echo redirect('');
            } else {
                echo swal('Không Thể Gia Hạn','error');
            }
            
        } else if($queryData['status'] == '2'){
            
        $query = $queryServer['hostname'].':2087/json-api/unsuspendacct?api.version=1&user='.$queryData['taikhoan'].'&password='.$queryData['matkhau'].'&enabledigest=0&db_pass_update=1'; 
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0); 
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,0);
        curl_setopt($curl, CURLOPT_HEADER,0); 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,1); 
        $header[0] = "Authorization: Basic " . base64_encode($queryServer['whmuser'].":".$queryServer['passwhm']) . "\n\r";
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header); 
        curl_setopt($curl, CURLOPT_URL, $query); 
        $result = curl_exec($curl); 
        $result = curl_exec($curl);
        if ($result == false) {
        }
        curl_close($curl);
        
        $inUpdate = mysqli_query($connect, "UPDATE Hosting SET hsd = '$khoiphuctime', status = '1', timesuspended = '' WHERE id = '$id'");
            if($inUpdate){
                echo swal('Gia Hạn Thành Công Cho Hosting (#'.inHoaString($queryData['domain']).') ', 'success');
                mysqli_query($connect, "UPDATE Users SET monney = monney - $tienphaitra WHERE username = '".$getUser['username']."'");
                echo redirect('');
            } else {
                echo swal('Không Thể Gia Hạn', 'error');
            }
            
        } else {
            echo swal('Dịch Vụ Quá Hạn Thanh Toán Không Thể Khôi Mục!', 'error');
        }
        
    }
}


if(isset($_POST['doiquyen'])){
    $password = md5($_POST['password']);
    $nguoinhan = $_POST['taikhoannhan'];
    $checkuser = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM Users WHERE username = '".$nguoinhan."'"));
    
    if(empty($nguoinhan) || $nguoinhan != $checkuser['username']){
        echo swal('Người Nhận Không Hợp Lệ!','error');
    } else if($password != $getUser['password']){
        echo swal('Không Đúng Mật Khẩu','error');
    } else if($getUser['monney'] < '100'){
        echo swal('Không Đủ Tiền Để Chuyển!','error');
    } else {
        $intrue = mysqli_query($connect,"UPDATE Hosting SET username = '$nguoinhan' WHERE id = '$id'");
        if($intrue){
            mysqli_query($connect,"UPDATE Users SET monney = monney - '100' WHERE username = '".$getUser['username']."'");
            echo swal('Chuyển Quyền Thành Công Cho Tài Khoản ('.inHoaString($nguoinhan).') ','success');
            echo redirect('/quan-ly-hosting');
        } else {
            echo swal('Chuyển Thất Bại!','error');
        }
    }
}

echo Title('Quản Lý Hosting #'.inHoaString($queryData['domain']));
?>


<div class="grid grid-col-12 gap-6 mt-5">
<div class="intro-y col-span-12 lg:col-span-6">
<div class="intro-y box p-5">

<center>
    
    <b style="font-size: 25px"> Quản Lý Hosting (<?=AntiXss(inHoaString($queryData['domain']));?>)</b>
    

<?php
if($queryData['status'] == '1'){
?>

<div id="basic-button" class="p-5">
<form action method="post">
<div class="preview">
<a class="btn btn-primary" data-tw-toggle="modal" data-tw-target="#giahan"> Gia Hạn </a>
 <button class="btn btn-secondary" type="submit" name="resetpass"> Đặt Lại Mật Khẩu </button> 
<a class="btn btn-success" data-tw-toggle="modal" data-tw-target="#delete"> Xóa Hosting </a>
<a class="btn btn-warning" data-tw-toggle="modal" data-tw-target="#reset"> Reset Hosting </a> 
<a class="btn btn-pending" data-tw-toggle="modal" data-tw-target="#nangcap"> Nâng Cấp </a>
<a class="btn btn-dark" data-tw-toggle="modal" data-tw-target="#doiquyen"> Đổi Quyền Quản Trị </a>
<a class="btn btn-pending" href="<?=$queryServer['hostname'];?>:2083/login/?user=<?=$queryData['taikhoan'];?>&pass=<?=$queryData['matkhau'];?>" target="_blank"> Truy Cập Cpanel </a>
</div></form>
</div>

<?php } else { ?>   <div id="basic-button" class="p-5">
<div class="preview">
<a class="btn btn-primary" onclick="swal('Thông Báo','Chức Năng Chỉ Có Hiệu Lực Khi Hosting Hoạt Động','error');"> Gia Hạn </a>
 <button class="btn btn-secondary"  onclick="swal('Thông Báo','Chức Năng Chỉ Có Hiệu Lực Khi Hosting Hoạt Động','error');"> Đặt Lại Mật Khẩu </button>
<button class="btn btn-success" onclick="swal('Thông Báo','Chức Năng Chỉ Có Hiệu Lực Khi Hosting Hoạt Động','error');"> Xóa Hosting </button>
<button class="btn btn-warning" onclick="swal('Thông Báo','Chức Năng Chỉ Có Hiệu Lực Khi Hosting Hoạt Động','error');"> Reset Hosting </button>
<button class="btn btn-pending" onclick="swal('Thông Báo','Chức Năng Chỉ Có Hiệu Lực Khi Hosting Hoạt Động','error');"> Nâng Cấp </button>
<button class="btn btn-danger" onclick="swal('Thông Báo','Chức Năng Chỉ Có Hiệu Lực Khi Hosting Hoạt Động','error');"> Đổi Miền Chính </button>
<a class="btn btn-pending" onclick="swal('Thông Báo','Chức Năng Chỉ Có Hiệu Lực Khi Hosting Hoạt Động','error');"> Truy Cập Cpanel </a>
</div>
</div>     <?php } ?>

  <b style="font-size: 15px"> Thông Tin Hosting </b> 

    <div style="padding-top: 15px;" class="row">
        
    <ul>
        <li> <b> <strongs class="text-white"> Tên Miền</strongs>: <a href="https://<?=AntiXss($queryData['domain']);?>" class="text-pending" target="_blank"> <?=AntiXss(inHoaString($queryData['domain']));?> </a></b></li>
        <li> <b> <strongs class="text-white"> Tài Khoản Cpanel </strongs>: <nt class="text-pending"> <?=$queryData['taikhoan'];?> </nt></b></li>
        <li> <b> <strongs class="text-white"> Mật Khẩu Cpanel </strongs>: <nt class="text-pending"> <?=$queryData['matkhau'];?> </nt></b></li>      
        <li> <b> <strongs class="text-white"> Link Cpanel </strongs>: <a class="text-warning" href="<?=AntiXss($queryServer['hostname']);?>:2083" target="_blank"> <?=AntiXss($queryServer['hostname']);?>:2083 </a></b></li>
        <li> <b> <strongs class="text-white"> IP Hosting </strongs>: <nt class="text-pending"> <?=inHoaString($queryServer['ip']);?> </nt></b></li>
        <li> <b> <strongs class="text-white"> DNS </strongs>: <nt class="text-pending"> <?=inHoaString($queryServer['dns1']);?> / <?=inHoaString($queryServer['dns2']);?> </nt></b></li>
    </ul>
  
    </div>
    
     <br>
     <b style="font-size: 15px; padding-top: 15px"> Chi Tiết Đăng Ký </b>

     <ul>
        <li> <b> <strongs class="text-white"> Gói Hosting </strongs>: HOSTING CPANEL - <?=inHoaString($queryData['plan']);?></b></li>
        <li> <b> <strongs class="text-white"> Giá Đăng Ký </strongs>: <nt class="text-success"> <?=Monney($queryData['price']);?> <sup>đ</sup> </nt></b></li>
        <li> <b> <strongs class="text-white"> Giá Gia Hạn </strongs>: <nt class="text-success"> <?=Monney($queryData['price']);?> <sup>đ</sup> </nt></b></li>      
        <?php
        if($queryData['status'] == 2){
            ?>
            
                 <li> <b> <strongs class="text-pending"> Hết Hạn Vào Lúc </strongs>: <?=ToTime($queryData['time']);?> </b></li> 
                 <li> <b> <strongs class="text-pending"> Chờ Gia Hạn </strongs>: <?=ToTime($queryData['timesuspended']);?> </b></li>

        
            <?php
        } else {
            ?>
            
        <li> <b> <strongs class="text-white"> Ngày Mua </strongs>: <?=ToTime($queryData['time']);?> </b></li>
        <li> <b> <strongs class="text-white"> Ngày Hết Hạn </strongs>: <?=ToTime($queryData['hsd']);?> </b></li>


            <?php
        }
        ?>
     
        <li> <b> <strongs class="text-white"> Trạng Thái </strongs>: <?=StatusHosting($queryData['status']);?> </b></li>
    </ul>
  
							      
							      
</center>

</div>
</div>
</div>


            
                 <div id="reset" class="modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-body p-0">
                <div class="p-5 text-center">
                <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                <div class="text-3xl mt-5"> Bạn chắc chắn chứ?</div>
                <div class="text-slate-500 mt-2"> Một khi bạn đã đồng ý đồng nghĩa với việc dữ liệu trên hosting sẽ bị mất.</div>
                </div>
                <form action method="post">
                <div class="px-5 pb-8 text-center">
                <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1"> Hủy </button>
                <button type="submit" name="reset" class="btn btn-danger w-24"> Đồng Ý</button>
                </div>
                </form>
                </div>
                </div>
                </div>
                </div>
                </div>
                
                    
                <div id="delete" class="modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-body p-0">
                <div class="p-5 text-center">
                <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                <div class="text-3xl mt-5"> Bạn chắc chắn chứ?</div>
                <div class="text-slate-500 mt-2"> Một khi bạn đã đồng ý đồng nghĩa với việc dữ liệu trên hosting sẽ bị mất.</div>
                </div>
                <form action method="post">
                <div class="px-5 pb-8 text-center">
                <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1"> Hủy </button>
                <button type="submit" name="delete" class="btn btn-danger w-24"> Đồng Ý</button>
                </div>
                </form>
                </div>
                </div>
                </div>
                </div>
                </div>


                                        <div id="doiquyen" class="modal" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="font-medium text-base mr-auto"> Chuyển Quyền Quản Trị (<?=AntiXss(inHoaString($queryData['domain']));?>) </h2>
                                                    </div>

                                                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                                                        <div class="col-span-12 sm:col-span-12">
                                                              <form action method="post">
                                                            <label for="modal-form-1" class="form-label"> Dịch Vụ </label>
                                                            <input type="text" class="form-control" value="<?=inHoaString($queryData['domain']);?>" disabled>
                                                        </div>
                                                        
                                                        <div class="col-span-12 sm:col-span-6">
                                                            <label for="modal-form-3" class="form-label"> Tài Khoản Nhận </label>
                                                            <input type="text" name="taikhoannhan" class="form-control" placeholder="Tài Khoản Nhận" autocomplete="off" required>
                                                        </div>         
                                                        
                                                        <div class="col-span-12 sm:col-span-6">
                                                            <label for="modal-form-3" class="form-label"> Nhập Mật Khẩu </label>
                                                            <input type="password" name="password" class="form-control" placeholder="Nhập Mật Khẩu Để Xác Nhận Gia Hạn" autocomplete="off" required>
                                                        </div>                  
                                                        </div>
                                                        
                                                    <div class="modal-footer">
                                                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1"> Đóng </button>
                                                        <button type="type" name="doiquyen" class="btn btn-primary"> Chuyển Ngay - 100 <sup>đ</sup></button>
                                                    </div>
                                                   </form>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        <div id="giahan" class="modal" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="font-medium text-base mr-auto"> Gia Hạn Dịch Vụ (<?=AntiXss(inHoaString($queryData['domain']));?>) </h2>
                                                    </div>

                                                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                                                        <div class="col-span-12 sm:col-span-6">
                                                              <form action method="post">
                                                            <label for="modal-form-1" class="form-label"> Dịch Vụ </label>
                                                            <input type="text" class="form-control" value="<?=inHoaString($queryData['domain']);?>" disabled>
                                                        </div>
                                                        <div class="col-span-12 sm:col-span-6">
                                                            <label for="modal-form-2" class="form-label"> Hạn Dùng </label>
                                                            <select class="form-control" name="hsd" id="hsd" onclick="topcloudvn()">
                                                                <option value=""> Chọn Hạn Dùng </option>
                                                                <option value="1"> 1 Tháng </option>
                                                                <option value="3"> 3 Tháng </option>
                                                                <option value="6"> 6 Tháng </option>
                                                                <option value="9"> 9 Tháng </option>
                                                                <option value="12"> 12 Tháng </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-span-12 sm:col-span-12">
                                                            <label for="modal-form-3" class="form-label"> Nhập Mật Khẩu </label>
                                                            <input type="password" name="password" class="form-control" placeholder="Nhập Mật Khẩu Để Xác Nhận Gia Hạn" autocomplete="off" required>
                                                        </div>                  
                                                        </div>
                                                        
                                                    <div class="modal-footer">
                                                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1"> Đóng </button>
                                                        <button type="type" name="giahan" class="btn btn-primary"> Gia Hạn -&nbsp;<div id="ketqua"> 0 </div> <sup>đ</sup></button>
                                                    </div>
                                                   </form>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                         <div id="nangcap" class="modal" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="font-medium text-base mr-auto"> Nâng Cấp Dịch Vụ (<?=AntiXss(inHoaString($queryData['domain']));?>) </h2>
                                                    </div>

                                                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                                                        <div class="col-span-12 sm:col-span-6">
                                                              <form action method="post">
                                                            <label for="modal-form-1" class="form-label"> Dịch Vụ </label>
                                                            <input type="text" class="form-control" value="<?=inHoaString($queryData['domain']);?>" disabled>
                                                        </div>
                                                        <div class="col-span-12 sm:col-span-6">
                                                            <label for="modal-form-2" class="form-label"> Hạn Dùng </label>
                                                            <select class="form-control" name="package">
                                                                <option value=""> Chọn Gói Muốn Nâng </option>
                                                                <?php
                                                                $checkgoi = mysqli_query($connect, "SELECT * FROM Plans WHERE maychu = '".$queryData['maychu']."' AND planapi != '".$queryData['plan']."'");
                                                                foreach($checkgoi as $row){
                                                                    $id+=1;
                                                                    ?>
                                                                    
                                                                <option value="<?=$row['planapi'];?>"> <?=inHoaString($row['planapi']);?> - <?=Monney($row['dungluong']);?>MB (<?=Monney($row['price']);?> <sup> đ </sup>) </option>    
                                                                
                                                                    <?php
                                                                } if($id < 1){
                                                                    echo '<option value=""> Không Còn Gói Cao Hơn </option>';
                                                                }
                                                                ?>
                                                                
                                                            </select>
                                                        </div>
                                                        <div class="col-span-12 sm:col-span-12">
                                                            <label for="modal-form-3" class="form-label"> Nhập Mật Khẩu </label>
                                                            <input type="password" name="password" class="form-control" placeholder="Nhập Mật Khẩu Để Xác Nhận Gia Hạn" autocomplete="off" required>
                                                        </div>                  
                                                        </div>
                                                        
                                                    <div class="modal-footer">
                                                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1"> Đóng </button>
                                                        <button type="type" name="nangcap" class="btn btn-primary"> Nâng Cấp </button>
                                                    </div>
                                                   </form>
                                                </div>
                                            </div>
                                        </div>
                                        
                                     
                                            
                                            
                <script>
                            function topcloudvn(){
                                const hsd = document.getElementById('hsd').value;
                                const price = '<?=$queryData['price'];?>';
                                
                                let tongtien = price * hsd;
                                let vndString = tongtien.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' }); 
                                let nguyenthanh = vndString.replace('₫', ''); 
                                document.getElementById('ketqua').innerHTML = nguyenthanh;
                            }
                        </script>
                        

<?php
include('../System/Footer.php');
?>