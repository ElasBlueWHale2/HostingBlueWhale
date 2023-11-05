<?php
include('Header.php');
if($getUser['level'] != 'admin'){
    echo loadto('/');
}


$id = $_GET['delete'];
$khoa = $_GET['khoa'];

if(isset($id)){
$queryData = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM Hosting WHERE id = '$id'"));
$queryPackage = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM ServerHost WHERE maychu = '".$queryData['maychu']."'"));
$hostname = $queryPackage['hostname'];
$whmusername = $queryPackage['userwhm'];
$whmpassword = $queryPackage['passwhm'];

    $query = $hostname.':2087/json-api/removeacct?api.version=1&user='.$queryData['taikhoan'].'&password='.$queryData['matkhau'].'&enabledigest=0&db_pass_update=1'; 
    $curl = curl_init(); 
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0); 
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,0);
    curl_setopt($curl, CURLOPT_HEADER,0); 
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,1); 
    $header[0] = "Authorization: Basic " . base64_encode($whmusername.":".$whmpassword) . "\n\r";
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);  
    curl_setopt($curl, CURLOPT_URL, $query);
    $result = curl_exec($curl); 
    $result = curl_exec($curl);
    if ($result == false) {
        echo swal('Không Thể Xóa!', 'error');
    }
    curl_close($curl);

    $deleteTrue = mysqli_query($connect, "DELETE FROM Hosting WHERE id = '$id'");
    echo swal('Xóa Thành Công!','success');
    echo redirect('./quanlyhost.php');
}
?>

<div class="content-wrapper" style="min-height: 2171.31px;">

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1> Danh Sách Hosting </h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Validation</li>
</ol>
</div>
</div>
</div>
</section>



<section class="content">
<div class="container-fluid">
<div class="row">

<div class="col-md-12">
<div class="card">
<div class="card-header">
<h3 class="card-title"> Danh Sách Hosting </h3>
</div>
 <div class="table-responsive">
<div class="card-body">
<table class="table table-bordered">
<thead>
<tr>
    
<th> Người Mua </th>
<th> Tên Miền </th>
<th> Gói </th>
<th> Cpanel </th>
<th> Thời Gian Mua </th>
<th> Thời Gian Hết Hạn </th>
<th> Trạng Thái </th>

<th style="width: 40px"> Thao Tác</th>
</tr>
</thead>
<tbody>

<?php 
$queryServer = mysqli_query($connect, "SELECT * FROM Hosting");
while($row = mysqli_fetch_assoc($queryServer)){
    $row2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM ServerHost WHERE maychu = '".$row['maychu']."'"));
    $id+=1;
?>

<tr>
<td> <?=inHoaString($row['username']);?> </td>
<td> <a href="https://<?=$row['domain'];?>" target="_blank"> <?=inHoaString($row['domain']);?> </a> </td>
<td> <?=inHoaString($row['plan']);?> </td>
<td> <a href="<?=$row2['hostname'];?>:2083/login/?user=<?=$row['taikhoan'];?>&pass=<?=$row['matkhau'];?>" target="_blank"> Login To Cpanel </a></td>
<td> <?=ToTime($row['time']);?> </td>
<td> <?=ToTime($row['hsd']);?> </td>
<td> <?=statushosting($row['status']);?> </td>
<td><a href="?delete=<?=$row['id'];?>" class="badge bg-danger"> Xóa </a></td>
</tr>

<?php } if($id < 1){
echo '
</tbody>
</table> <center> <b> Không Có Kết Quả </b> </center>';
} else {
echo '</tbody>
</table>';
} ?>

</div>

<div class="card-footer clearfix">
<ul class="pagination pagination-sm m-0 float-right">
<li class="page-item"><a class="page-link" href="#">«</a></li>
<li class="page-item"><a class="page-link" href="#">1</a></li>
<li class="page-item"><a class="page-link" href="#">2</a></li>
<li class="page-item"><a class="page-link" href="#">3</a></li>
<li class="page-item"><a class="page-link" href="#">»</a></li>
</ul>
</div>
</div>

</div>

</div>

</div>
</section>

</div>



<?php
include('Footer.php');
?>