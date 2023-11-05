<?php
include('../System/Header.php');
if(isset($_POST['napthe'])){
    $telco = $_POST['telco'];
    $amount = $_POST['amount'];
    $serial = $_POST['serial'];
    $code = $_POST['code'];
    $requestid = rand(1000000000,99999999999);
    $checkLimit = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM DataCard WHERE status = '2' AND time2 = '".date('dm/Y')."' AND username = '".$getUser['username']."'"));
    
    if(empty($telco)){
        echo swal('Vui Lòng Chọn Loại Thẻ!','error');
    } else if(empty($amount)){
        echo swal('Vui Lòng Chọn Mệnh Giá!','error');
    } else if(empty($code)){
         echo swal('Vui Lòng Nhập Mã Thẻ!','error');
    } else if(empty($serial)){
         echo swal('Vui Lòng Nhập Serial!','error');
    } else if($checkLimit >= 3){
        echo swal('Bạn Đã Bị Khóa Nạp Thẻ, Vui Lòng Quay Lại Sau!','error');
    } else {
        
            $command = 'charging';  
            $url = 'https://doithe1s.vn/chargingws/v2';
            $dataPost = array();
            $dataPost['request_id'] = $requestid;
            $dataPost['code'] = $code;
            $dataPost['partner_id'] = $partner_id;
            $dataPost['serial'] = $serial;
            $dataPost['telco'] = $telco;
            $dataPost['command'] = $command;
            ksort($dataPost);
            $sign = $partner_key;
            foreach ($dataPost as $item) {
                $sign .= $item;
            }
            
            $mysign = md5($sign);
    
            $dataPost['amount'] = $amount;
            $dataPost['sign'] = $mysign;
    
            $data = http_build_query($dataPost);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            curl_setopt($ch, CURLOPT_REFERER, $actual_link);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            curl_close($ch);
    
            $obj = json_decode($result);

            if ($obj->status == 99) {
            $inTrue = mysqli_query($connect, "INSERT INTO `DataCard`(`id`, `username`, `code`, `serial`, `amount`, `telco`, `requestid`, `status`, `time`, `time2`, `time3`) VALUES (NULL,'".$getUser['username']."','$code','$serial','$amount','$telco','$requestid','0','".time()."', '".date('d/m/Y')."', '".date('m/Y')."')");
                if($inTrue){
                    echo swal('Nạp Thẻ Thành Công, Vui Lòng Chờ Duyệt!','success');
                } else {
                    echo swal('Không Thể Lưu Dữ Liệu!','error');
                }
            } else {
                echo swal($obj->message, 'error');
            }


    }

}

echo Title('Nạp Tiền Qua Thẻ Cào');

?>

<div class="content">

                <div class="col-span-12 lg:col-span-12 2xl:col-span-12">
                    <div class="intro-y box mt-5">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                            <h2 class="font-bold text-2xl mr-auto">
                                Nạp Thẻ Cào
                            </h2>
                        </div>
                        <form method="POST" action>
                            <div class="row p-5">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="card_type" class="form-label">Loại Thẻ</label>
                                        <select class="form-control" name="telco">
                                            <option value="">-- Chọn loại thẻ --</option>
                                            <option value="VIETTEL">VIETTEL</option>
                                            <option value="VINAPHONE">VINAPHONE</option>
                                            <option value="MOBIFONE">MOBIFONE</option>
                                            <option value="VNMOBI">VIETNAMOBILE</option>
                                           <option value="ZING">ZING</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 mt-2">
                                    <div class="form-group">
                                        <label for="card_price" class="form-label">Mệnh Giá</label>
                                        <select class="form-control" name="amount">
                                            <option value="">-- Chọn mệnh giá --</option>
                                            <option value="10000">10.000đ</option>
                                            <option value="20000">20.000đ</option>
                                            <option value="30000">30.000đ</option>
                                            <option value="50000">50.000đ</option>
                                            <option value="100000">100.000đ</option>
                                            <option value="200000">200.000đ</option>
                                            <option value="300000">300.000đ</option>
                                            <option value="500000">500.000đ</option>
                                            <option value="1000000">1.000.000đ</option>
                                            <option value="2000000">2.000.000đ</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-3 mt-2">
                                    <div class="form-group">
                                        <label for="pin" class="form-label">Mã Thẻ</label>
                                        <input type="text" name="code" class="form-control" placeholder="Nhập mã thẻ">
                                    </div>
                                </div>
                                <div class="col-md-3 mt-2">
                                    <div class="form-group">
                                        <label for="seri" class="form-label">Mã Serial</label>
                                        <input type="number" name="serial" placeholder="Nhập seri của thẻ" class="form-control">
                                    </div>
                                </div>
                            </div>
        
                            <div class="form-group p-5 flex justify-end">
                                <button type="submit" name="napthe" class="btn btn-primary btn-block btn-lg">NẠP NGAY</button>
                            </div>

                        </form>
                    </div>
                </div>

                <div class="intro-y box mt-5">
<div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
<h2 class="font-medium text-base mr-auto"> Lịch Sử Nạp Thẻ </h2>
</div>


<div class="p-5" id="responsive-table">
<div class="preview">
<div class="overflow-x-auto">
<table class="table">
<thead>
<tr>
<th class="whitespace-nowrap">STT</th>
<th class="whitespace-nowrap"> Mã Thẻ </th>
<th class="whitespace-nowrap"> Serial </th>
<th class="whitespace-nowrap"> Mệnh Giá </th>
<th class="whitespace-nowrap"> Loại Thẻ </th>
<th class="whitespace-nowrap"> Trạng Thái </th>
<th class="whitespace-nowrap"> Thời Gian Nạp </th>
</tr>
</thead>
<tbody>
    
    <?php
    $danhsach = mysqli_query($connect, "SELECT * FROM DataCard WHERE username = '".$getUser['username']."'");
    while($row = mysqli_fetch_assoc($danhsach)){
        $id+=1;
    ?>
<tr>
<td class="whitespace-nowrap"><?=$id;?></td>
<td class="whitespace-nowrap"> <?=$row['code'];?> </td>
<td class="whitespace-nowrap"> <?=$row['serial'];?> </td>
<td class="whitespace-nowrap"><?=Monney($row['amount']);?></td>
<td class="whitespace-nowrap"><?=inHoaString($row['telco']);?></td>
<td class="whitespace-nowrap"> <?=StatusCard($row['status']);?> </td>
<td class="whitespace-nowrap"><?=ToTime($row['time']);?></td>
</tr>

<?php } if($id < 1){ echo NodataTabled(); } else { echo '
</tbody>
</table>'; } ?>


</div>
</div>

</div>
</div>

            </div>

<?php
include('../System/Footer.php');
?>