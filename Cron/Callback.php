<?php
include('../System/Config.php');

$requestid = $_GET['request_id'];
$status = $_GET['status'];
$amount = $_GET['amount'];

if($status == '1'){
    $data = mysqli_query($connect, "SELECT * FROM `DataCard` WHERE `requestid` = '".$requestid."'");
	$get = mysqli_fetch_assoc($data);
	mysqli_query($connect, "UPDATE DataCard SET `status` = '1' WHERE `requestid` = '".$requestid."'");
	mysqli_query($connect, "UPDATE Users SET `monney` = `monney` + '".$amount."' WHERE `username` = '".$get['username']."'");
} else {
    mysqli_query($connect, "UPDATE DataCard SET `status` = '2' WHERE `requestid` = '".$requestid."'");
}


?>