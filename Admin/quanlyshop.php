<?php
include('Header.php');
$duyet = $_GET['duyet'];
$huy = $_GET['huy'];

if(isset($duyet)){
    mysqli_query($connect, "UPDATE DataWeb SET status = '1' WHERE id = '$duyet'");
    echo swal('Thành Công','success');
    echo redirect('./quanlyshop.php');
} else if(isset($huy)){
    $query = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM DataWeb WHERE id = '$huy'"));
    $template = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM Template WHERE id = '".$query['template']."'"));
    $delete = mysqli_query($connect, "UPDATE DataWeb SET status = '4' WHERE id = '$huy'");
    if($delete){
        mysqli_query($connect, "UPDATE Users SET monney = monney + '".$template['price']."' WHERE username = '".$query['username']."'");
        echo swal('Thành Công','success');
        echo redirect('./quanlyshop.php');
    }

}
?>

<div class="content-wrapper" style="min-height: 2171.31px;">

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1> Danh Sách Trang Web </h1>
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
<h3 class="card-title"> Danh Sách Shop </h3>
</div>
 <div class="table-responsive">
<div class="card-body">
<table class="table table-bordered">
<thead>
<tr>
    
<th> Người Mua </th>
<th> Tên Miền </th>
<th> Tài Khoản </th>
<th> Mật Khẩu </th>
<th> Giao Diện </th>
<th> Thời Gian Mua </th>
<th> Thời Gian Hết Hạn </th>
<th> Trạng Thái </th>
<th style="width: 40px"> Thao Tác</th>
</tr>
</thead>
<tbody>

<?php 
$queryServer = mysqli_query($connect, "SELECT * FROM DataWeb");
while($row = mysqli_fetch_assoc($queryServer)){
    $id+=1;
?>

<tr>
<td> <?=inHoaString($row['username']);?> </td>
<td> <a href="https://<?=$row['domain'];?>" target="_blank"> <?=inHoaString($row['domain']);?> </a> </td>
<td> <?=$row['taikhoan'];?> </td>
<td> <?=$row['matkhau'];?> </td>
<td> <?=inHoaString($row['template']);?> </td>
<td> <?=ToTime($row['time']);?> </td>
<td> <?=ToTime($row['timeend']);?> </td>
<td> <?=StatusHosting($row['status']);?> </td>
<td><a href="?duyet=<?=$row['id'];?>" class="badge bg-primary"> Duyệt </a> <a href="?huy=<?=$row['id'];?>" class="badge bg-danger"> Hủy & Hoàn Tiền </a></td>
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