<?php
include('../System/Header.php');
$id = $_GET['id'];
$queryData = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM Plans WHERE id = '$id'"));
$checkServer = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM ServerHost WHERE maychu = '".$queryData['maychu']."'"));
if($id != $queryData['id']){
    echo redirect('/');
}

if(isset($_POST['muahost'])){
    $domain = AntiXss($_POST['domain']);
    $hsd = AntiXss($_POST['hsd']);
    $taikhoan = 'mpa'.rand(100000,900000); 
    $matkhau = 'dvc'.rand(100000,9000000); 
    $giaphaitra = $queryData['price'] * $hsd;
    $timehethan = time()+(2592000 * $hsd);
    $checkLimit = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM Hosting WHERE domain = '$domain' AND maychu = '".$queryData['maychu']."'"));
    
    if(empty($domain)){
        echo swal('Vui Lòng Nhập Miền!','error');
    } else if(empty($hsd)){
        echo swal('Vui Lòng Chọn Hạn Sử Dụng!','error');
    } else if($hsd < 1 || $hsd > 12){
        echo swal('Hạn Sử Dụng Không Hợp Lệ!','error');
    } else if($getUser['monney'] < $giaphaitra){
        echo swal('Vui Lòng Nạp Thêm Tiền Để Thanh Toán!','error');
    } else if($checkLimit >= 1){
        echo swal('Tên Miền Đã Tồn Tại Trong Máy Chủ Này!','error');
    } else {
            
    $inTrue = mysqli_query($connect, "INSERT INTO `Hosting`(`id`, `domain`, `username`, `taikhoan`, `matkhau`, `plan`, `status`, `time`, `hsd`, `maychu`, `price`) VALUES (NULL, '$domain', '".$getUser['username']."', '$taikhoan', '$matkhau', '".$queryData['planapi']."', '0', '".time()."', '$timehethan', '".$queryData['maychu']."', '".$queryData['price']."')");
    if($inTrue){
    mysqli_query($connect, "UPDATE Users SET monney = monney - $giaphaitra WHERE username = '".$getUser['username']."'");
    echo swal('Mua Hosting Thành Công, Hãy Truy Cập Vào Quản Lý Hosting Để Xem Chi Tiết!', 'success');
    echo redirect('');
    }
}
}

echo Title('Thanh Toán Hosting #'.inHoaString($queryData['planapi']));
?>


<div class="content">
                <div class="intro-y flex items-center mt-5">
                    <div class="quochuy">
                        <h2 class="font-bold text-2xl mr-auto">
                          Thanh Toán Dịch Vụ    
                          </h2>
                    </div>
                </div>
                
                
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y box col-span-12 md:col-span-6 lg:col-span-6 xl:col-span-6">
                        <div class="border-b border-gray-100 dark:border-gray-700 bg-black">
                            <h5 class="text-lg text font-semibold px-5 py-3"> Thông Tin Dịch Vụ</h5>
                        </div>
                        <div class="col-span-12 lg:col-span-6 mt-6">
                            <div class="box p-8 relative overflow-hidden intro-y">
                                <div class="leading-[2.15rem] w-full sm:w-52 text-primary dark:text-white text-xl -mt-3">
                                    CPANEL - <?=inHoaString($queryData['planapi']);?>
                                </div>
                                <div class="w-full sm:w-60 leading-relaxed text-slate-500 mt-2 flex align-center">
                                    <div class="domail-icon mr-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="hard-drive" data-lucide="hard-drive" class="lucide lucide-hard-drive">
                                            <line x1="22" y1="12" x2="2" y2="12"></line>
                                            <path d="M5.45 5.11L2 12v6a2 2 0 002 2h16a2 2 0 002-2v-6l-3.45-6.89A2 2 0 0016.76 4H7.24a2 2 0 00-1.79 1.11z"></path>
                                            <line x1="6" y1="16" x2="6.01" y2="16"></line>
                                            <line x1="10" y1="16" x2="10.01" y2="16"></line>
                                        </svg></div>
                                    <div class="title-icon">
                                        Dung Lượng SSD: <?=Monney($queryData['dungluong']);?> MB                                    </div>
                                </div>
                                <div class="w-full sm:w-60 leading-relaxed text-slate-500 mt-2 flex align-center">
                                    <div class="domail-icon mr-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="box" data-lucide="box" class="lucide lucide-box">
                                            <path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"></path>
                                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                        </svg></div>
                                    <div class="title-icon">
                                        Miền Khác:  <?=$queryData['mienkhac'];?>
                                    </div>
                                </div>
                                <div class="w-full sm:w-60 leading-relaxed text-slate-500 mt-2 flex align-center">
                                    <div class="domail-icon mr-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="credit-card" data-lucide="credit-card" class="lucide lucide-credit-card">
                                            <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                            <line x1="1" y1="10" x2="23" y2="10"></line>
                                        </svg></div>
                                    <div class="title-icon">
                                        Backup:  <?=$queryData['backup'];?>
                                    </div>
                                </div>
                                <div class="w-48 relative mt-6 cursor-pointer tooltip">
                                    <a href="/cpanels" class="btn btn-elevated-warning w-24 mr-1 mb-2"> Thay Đổi </a>
                                </div>
                                <img class="hidden sm:block absolute top-0 right-0 w-1/2 mt-1 -mr-12" alt="CUNG CẤP BỞI TOPCLOUDVN.NET" src="https://cloudcore.vn/wp-content/uploads/2021/04/Cloud-WordPRess-Hosting.png">
                            </div>
                        </div>
                    </div>
                    
                    <div class="intro-y box col-span-12 md:col-span-6 lg:col-span-6 xl:col-span-6">
                        <div class="bg w-full mb-5">
                            <div class="border-b border-gray-100 dark:border-gray-700 bg-black">
                                <h5 class="text-lg font-semibold py-3 px-5">Đăng Ký Thông Tin</h5>
                            </div>
                            <div class="table-content-2"> 
                                <div class="py-3 px-4 overflow-x-auto">
                                    <div class="preview">
                                         <form action method="post">
                                        <div class="mt-3">
                                            <label for="regular-form-4" class="form-label"> Tên Miền </label>
                                            <input name="domain" type="text" class="form-control" placeholder="Nhập tên miền ">
                                        </div>
                                        <div class="mt-3">
                                            <label for="regular-form-5" class="form-label"> Hạn Hạn Sử Dụng </label>
                                            <select class="form-select" id="hsd" name="hsd" onchange="topcloudvn()">
                                                <option value="0">--- Vui lòng chọn hạn sử dụng ---</option>
                                                <option value="1">1 Tháng</option>
                                                 <option value="3">3 Tháng</option>
                                                  <option value="6">6 Tháng</option>
                                                   <option value="9">9 Tháng</option>
                                                    <option value="12">12 Tháng</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 px-4 pt-1">
                                <div class="w-full">
                                    <div class="alert alert-info alert-dismissible alert-outline show" role="alert" style="text-align:center">
                                        Số tiền thanh toán : <b id="gia" style="color: red;"> 0 </b> <sup> đ </sup>
                                    </div> 
                                </div>
                            </div>
                            <div class="col-span-12 px-4 pt-4">  
                                <div class="w-full">
                                    <button type="submit" name="muahost" class="cursor-pointer border rounded w-full text-center btn btn-primary inline-block mr-1"> <i class="fa fa-shopping-cart mr-2"></i> Mua Ngay </button>
                                </div>
                                 </form>
                            </div>
                        </div>
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
                    document.getElementById('gia').innerHTML = nguyenthanh;
                }
            </script>

<?php
include('../System/Footer.php');
?>