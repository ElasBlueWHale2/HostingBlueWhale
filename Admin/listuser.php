<?php
include('Header.php');
if($getUser['level'] != 'admin'){
    echo loadto('/');
}

?>


<div class="content-wrapper" style="min-height: 767.207px;">

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1> Quản Lý Thành Viên </h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item">
    <a href="#">Home</a>
</li>
<li class="breadcrumb-item active">Validation</li>
</ol>
</div>
</div>
</div>
</section>


<section class="content">
<div class="container-fluid">

<div class="card card-info">
<div class="card-header">
<h3 class="card-title"> Danh Sách Thành Viên </h3>
<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
<i class="fas fa-minus"></i>
</button>
</div>
</div><div class="table-responsive">
<div class="card-body p-0">
<table class="table">
<thead>
    
<tr>
<th> ID </th>
<th> Tên Đăng Nhập </th>
<th> Email </th>
<th> Mật Khẩu </th>
<th> Số Dư </th>
<th> Lệnh Cấm </th>
<th> Thời Gian </th>
<th> Thao Tác </th>
</tr>
</thead>
<tbody>
    
    <?php
    $topcloudvn = mysqli_query($connect, "SELECT * FROM Users");
    foreach($topcloudvn as $row){
        $id+=1;
        ?>
        
     
<tr>
<td> <?=$id;?> </td>
<td> <?=$row['username'];?> </td>
<td> <?=$row['email'];?> </td>
<td> <?=$row['password'];?></td>
<td> <?=Monney($row['monney']);?> <sup> đ </sup></td>
<td> <?php if($row['band'] == '1'){ echo '<span class="badge bg-danger"> Bay Màu </span>'; } else { echo '<span class="badge bg-info"> Hoạt Động </span>'; };?> </td>
<td> <?=ToTime($row['time']);?> </td>

<td>
<div class="btn-group btn-group-sm">
<a href="?band=<?=$row['id'];?>" class="btn btn-danger"> Cấm </a>
</div> 
</td>

</tr>

<?php } if($id < 1){
echo '<br>
</tbody>
</table> <center> <b> Không Có Kết Quả </b> </center>';
} else {
echo '</tbody>
</table>';
} ?>

</div>

</div>



</div>
</div>
</section></div>

</div>


<?php
$band = $_GET['band'];

if(isset($band)){
    mysqli_query($connect, "UPDATE Users SET band = '1' WHERE id = '$band'");
    echo swal('Thành công','success');
    echo redirect('./listuser.php');
}

include('Footer.php');
?>