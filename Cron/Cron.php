<?php
include('../System/Config.php');
            
            $giahan = 'true';
            $queryHost = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM Hosting WHERE hsd < '".time()."' AND status != '2'"));
            $queryServer = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM ServerHost WHERE maychu = '".$queryHost['maychu']."'"));
            $timesuspended = time()+(86400*3);

                if($giahan){
                $query = $queryServer['hostname'].':2087/json-api/suspendacct?api.version=1&user='.$queryHost['taikhoan'].'&password='.$queryHost['matkhau'].'&enabledigest=0&db_pass_update=1'; 
                $curl = curl_init(); 
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0); 
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,0); 
                curl_setopt($curl, CURLOPT_HEADER,0);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER,1); 
                $header[0] = "Authorization: Basic " . base64_encode($queryServer['whmuser'].":".$queryServer['passwhm']) . "\n\r";
                curl_setopt($curl, CURLOPT_HTTPHEADER, $header); 
                curl_setopt($curl, CURLOPT_URL, $query);
                $result = curl_exec($curl); 
                if ($result == false) {
                echo swal($result,'error');
                } else {
    
                # Chuyển Trạng Thái Sang Chờ Gia Hạn
                $suspended = mysqli_query($connect, "UPDATE Hosting SET status = '2', timesuspended = '$timesuspended' WHERE id = '".$queryHost['id']."'");
                if($suspended){
                    echo console($result);
                }
                
                }
                curl_close($curl);   
    
                }

            # Chuyển Trạng Thái Sang Hết Hạn
            $suspendedhost = mysqli_query($connect, "UPDATE Hosting SET status = '3' WHERE timesuspended < '".time()."'");
            $checkhethan = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM Hosting WHERE status = '3'"));
            $dvhethan = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM ServerHost WHERE maychu = '".$checkhethan['maychu']."'"));

                $hethan = 'true';
                if($hethan){
            $query = $dvhethan['hostname'].':2087/json-api/removeacct?api.version=1&user='.$checkhethan['taikhoan'].'&password='.$checkhethan['matkhau'].'&enabledigest=0&db_pass_update=1'; 
            $curl = curl_init(); 
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0); 
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,0);
            curl_setopt($curl, CURLOPT_HEADER,0); 
            curl_setopt($curl, CURLOPT_RETURNTRANSFER,1); 
            $header[0] = "Authorization: Basic " . base64_encode($dvhethan['whmuser'].":".$dvhethan['passwhm']) . "\n\r";
            curl_setopt($curl, CURLOPT_HTTPHEADER, $header);  
            curl_setopt($curl, CURLOPT_URL, $query);
            $result = curl_exec($curl); 
            $result = curl_exec($curl);
            if ($result == false) {
                echo console($result);
            } else {
                $intrue = mysqli_query($connect, "DELETE FROM Hosting WHERE id = '".$checkhethan['id']."'");
            }
            curl_close($curl);
}


            $taohost = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM Hosting WHERE status = '0'"));
            if($taohost['status'] == '0'){
            $Thongtinsv = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM ServerHost WHERE maychu = '".$taohost['maychu']."'"));
            
                $query = $Thongtinsv['hostname'].':2087/json-api/createacct?api.version=1&username='.$taohost['taikhoan'].'&domain='.$taohost['domain'].'&plan='.$Thongtinsv['whmuser'].'_'.$taohost['plan'].'&featurelist=default&password='.$taohost['matkhau'].'&ip=n&cgi=1&hasshell=1&contactemail=thanhda4329q@gmail.com&cpmod=paper_lantern&language=vi'; 
                $curl = curl_init(); 
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0); 
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,0); 
                curl_setopt($curl, CURLOPT_HEADER,0);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER,1); 
                $header[0] = "Authorization: Basic " . base64_encode($Thongtinsv['whmuser'].":".$Thongtinsv['passwhm']) . "\n\r";
                curl_setopt($curl, CURLOPT_HTTPHEADER, $header); 
                curl_setopt($curl, CURLOPT_URL, $query);
                $result = curl_exec($curl); 
                if ($result == false) {
                    $hehe = mysqli_query($connect, "UPDATE Hosting SET status = '4' WHERE id = '".$taohost['id']."'");
                    if($hehe){
                        mysqli_query($connect, "UPDATE Users SET monney = monney + '".$taohost['price']."' WHERE username = '".$taohost['username']."'");
                    }
                }
                curl_close($curl);   
                
                mysqli_query($connect, "UPDATE Hosting SET status = '1' WHERE id = '".$taohost['id']."'");
                
            }
            
            
         mysqli_query($connect, "UPDATE DataWeb SET status = '2', timesuspended = '$timesuspended' WHERE timeend < '".time()."' AND status = '1'");
         mysqli_query($connect, "UPDATE DataWeb SET status = '3' WHERE timesuspended < '".time()."' AND status = '2'");
            
            
            # Load Dữ Liệu Từ DichVuDark
            
            
$MEMO_PREFIX = '';
function parse_order_id($des){
    global $MEMO_PREFIX;
    $re = '/'.$MEMO_PREFIX.'\d+/im';
    preg_match_all($re, $des, $matches, PREG_SET_ORDER, 0);
    if (count($matches) == 0 )
        return null;
    // Print the entire match result
    $orderCode = $matches[0][0];
    $prefixLength = strlen($MEMO_PREFIX);
    $orderId = intval(substr($orderCode, $prefixLength ));
    return $orderId ;
}

 $dataPost = array(
 "Loai_api" => "lsgd1h",
 );
 $curl = curl_init();
 curl_setopt_array($curl, array(
 CURLOPT_URL => "https://api.dichvudark.vn/api/ApiMomo",
 CURLOPT_RETURNTRANSFER => true,
 CURLOPT_SSL_VERIFYPEER => false,
 CURLOPT_MAXREDIRS => 10,
 CURLOPT_TIMEOUT => 30,
 CURLOPT_CUSTOMREQUEST => "POST",
 CURLOPT_POSTFIELDS => $dataPost,
 CURLOPT_HTTPHEADER => array(
 "Code: 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",
 "Token: $tokenmomo",
 "Hour: 1")
 ));
 $response = curl_exec($curl);
 curl_close($curl);

 $momo = json_decode($response,true);
 
 foreach ($momo['tranList'] as $data) {
        $partnerId      = $data['partnerId'];              
        $comment        = $data['comment'];                 
        $tranId         = $data['tranId'];                  
        $partnerName    = $data['partnerName'];             
        $amount         = $data['amount'];                 
        $user = parse_order_id($comment);
        
         $check = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM SaveMomo WHERE requestid = '$tranId'"));
			if($check < 1){ 
               mysqli_query($connect, "INSERT INTO `SaveMomo` (`id`, `price`, `requestid`, `noidung`, `time`, `time2`, `time3`, `nameBank`, `status`) VALUES (NULL, '$amount', '$tranId', '$comment', '".time()."', '".date('d/m/Y')."', '".date('m/Y')."', '$partnerName', '0')");
			} 
 }
 

            $getMomo = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM SaveMomo WHERE status = '0'"));
            $nhthanh = inThuongString($getMomo['noidung']);
            $checkuser = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM Users WHERE username = '$nhthanh'"));
            if($nhthanh == inThuongString($checkuser['username'])){
            mysqli_query($connect, "UPDATE Users SET monney = monney + '".$getMomo['price']."' WHERE username = '".$checkuser['username']."'");
            mysqli_query($connect, "UPDATE SaveMomo SET status = '1' WHERE noidung = '".$checkuser['username']."'");
            }

?>