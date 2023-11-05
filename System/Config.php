<?php
session_start();

/* ---------------------------------------------------------------------
         - CODE CUNG CẤP BỞI TOPCLOUDVN.NET
         - VIẾT BỞI: NGUYỄN THÀNH IT (FB.COM/IAMTHANH.XDEVELOPER)
         # VUI LÒNG KHÔNG XÓA BẢN QUYỀN ĐỂ TÔN TRỌNG TÁC GIẢ
------------------------------------------------------------------------*/

$configdatabase = array(
    'localhost' => 'localhost',
    'database' => 'topc1bwptpy_aaa',
    'userbase' => 'topc1bwptpy_aaa',
    'passbase' => 'topc1bwptpy_aaa'
    );

$connect = mysqli_connect($configdatabase['localhost'], $configdatabase['database'], $configdatabase['userbase'], $configdatabase['passbase']);
if(!$connect){
    die('Không Thể Kết Nối Đến Database');
}
mysqli_query($connect,"SET NAMES 'UTF8'");
date_default_timezone_set('Asia/Ho_Chi_Minh'); 

if(isset($_SESSION['users'])){
    $getUser = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM Users WHERE username = '".$_SESSION['users']."'"));
    if($_SESSION['users'] != $getUser['username']){
        unset($_SESSION['users']);
        die('Phiên Đăng Nhập Không Hợp Lệ!');
    }
    
    if($getUser['band'] == '1'){
        die('Tài khoản đã bị cấm, vui lòng liên hệ admin để biết thêm chi tiết!');
    }
    
    $level = $getUser['level'];
    
} 
function convertTopcloud($string) {
    $string = str_replace(' ', '%', $string);
    $string = iconv('UTF-8', 'ASCII//TRANSLIT', $string); 

    return $string;
}

$setting = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM Settings WHERE id = '1'"));
$configcard = array('partnerid' => $setting['partnerid'], 'partnerkey' => $setting['partnerkey'], 'callback' => 'https://'.$_SERVER['SERVER_NAME'].'/Callback');
$configmomo = array('token' => $setting['tokenmomo'],'name' => $setting['namemomo'], 'stk' => $setting['numberacc'], 'qrcode' => 'https://topcloudvn.net/apiqr?data=2|99|'.$setting['numberacc'].'|'.convertTopcloud($setting['namemomo']).'||0|0|0||transfer_myqr&height=144&width=144');
$tokenmomo = $configmomo['token'];

$partner_id = $configcard['partnerid'];
$partner_key = $configcard['partnerkey'];


function ToTime($time){
    return date('d/m/Y - h:i:s', $time);
}

function inHoaString($text){
    return strtoupper($text);
}

function inOneString($text){
    return ucwords($text);
}

function inThuongString($text){
    return strtolower($text);
}


function AntiXss($text){
    return htmlentities($text);
}


function Monney($monney){
    return str_replace(".", ",", number_format($monney));
}

function swal($text, $status){
    return '<script>swal("Thông Báo", "'.$text.'", "'.$status.'");</script>';
}

function redirect($url){
    if(!isset($_SESSION['users'])){
        return '<script>location.href="'.$url.'";</script>';
    } else {
    return '<meta http-equiv="refresh" content="0; url='.$url.'">';
    }
}


function loadto($url){
        return '<script>location.href="'.$url.'";</script>';
}

function CheckLogin(){
    if(!isset($_SESSION['users'])){
        echo redirect('/login');
    }
}

function NameWeb(){
    return inHoaString($_SERVER['SERVER_NAME']);
}

function statushostadmin($status){
    if($status == 'off'){
        return '<span class="badge bg-danger"> Ẩn </span>';
    } else {
        return '<span class="badge bg-info"> Hiển Thị </span>';
    }
}

function statushosting($status){
    if($status == '1'){
        return '<button class="btn btn-success"> Hoạt Động </button>';
    } else if($status == '2'){
        return '<button class="btn btn-warning"> Chờ Gia Hạn </button>';
    } else if($status == '3'){
        return '<button class="btn btn-warning"> Hết Hạn </button>';
    } else if($status == '4'){
        return '<button class="btn btn-warning"> Bị Hủy </button>';
    } else if($status == '0'){
        return '<button class="btn btn-primary"> Đang Tạo </button>';
    }
}


function StatusMomo($status){
    if($status == '1'){
        return '<button class="btn btn-success"> Hoàn Thành </button>';
    } else if($status == '0'){
        return '<button class="btn btn-pending"> Chờ Nạp </button>';
    } 
}

function StatusCard($status){
    if($status == '1'){
        return '<button class="btn btn-success"> Thẻ Đúng </button>';
    } else if($status == '2'){
        return '<button class="btn btn-danger"> Thẻ Sai </button>';
    } else if($status == '0'){
        return '<button class="btn btn-pending"> Chờ Duyệt </button>';
    } 
}


function console($text){
    return '<script>console.log("'.$text.'");</script>';
}

function NodataTabled(){
    return '</tbody></table> <br><center><b class="text-center">Không Có Dữ Liệu!</b></center>';
}

function Title($text){
    return '<title> '.$text.' - '.NameWeb().' </title>';
}


$time = date('d-m-Y - H:i:s');
?>