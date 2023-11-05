<?php
include('Header.php');

if($getUser['level'] != 'admin'){
    echo loadto('/');
}

$id = $_GET['id'];
$query = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM ServerHost WHERE id = '$id'"));
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $idname = $_POST['idname'];
    $hostname = $_POST['hostname'];
    $whmuser = $_POST['whmuser'];
    $whmpass = $_POST['passwhm'];
    $dns1 = $_POST['dns1'];
    $dns2 = $_POST['dns2'];
    $ip = $_POST['ip'];
    $status = $_POST['status'];
    
    $inTrue = mysqli_query($connect, "UPDATE `ServerHost` SET `name`='$name',`maychu`='$idname',`hostname`='$hostname',`whmuser`='$whmuser',`passwhm`='$whmpass',`dns1`='$dns1',`dns2`='$dns2',`ip`='$ip',`value`='$status' WHERE id = '$id'");
    
    if($inTrue){
        echo swal('Thêm Thành Công!','success');
        echo redirect('');
    } else {
        echo swal('Thêm Thất Bại','error');
    }
}

?>


<div class="content-wrapper" style="min-height: 767.207px;">

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1> Quản Lý Máy Chủ </h1>
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

<div class="col-md-6">

<div class="card card-primary">
<div class="card-header">
 <h3 class="card-title"> Chỉnh Sửa Máy Chủ </h3>
</div>


<div>
<div class="card-body">
    <form action method="post">
<div class="form-group">
<label for="exampleInputEmail1"> Tên Máy Chủ </label>
<input type="text" class="form-control" name="name" placeholder="Tên Máy Chủ" value="<?=$query['name'];?>">
</div>


<div class="form-group">
<label for="exampleInputEmail1"> ID Máy Chủ </label>
<input type="text" class="form-control" name="idname" placeholder="ID Máy Chủ" value="<?=$query['maychu'];?>">
</div>


<div class="form-group">
<label for="exampleInputEmail1"> Hostname </label>
<input type="text" class="form-control" name="hostname" placeholder="Liên Kết Máy Chủ (Không Gồm :2087)" value="<?=$query['hostname'];?>">
</div>

<div class="form-group">
<label for="exampleInputEmail1"> WHM USERNAME </label>
<input type="text" class="form-control" name="whmuser" placeholder="Tài Khoản WHM" value="<?=$query['whmuser'];?>">
</div>


<div class="form-group">
<label for="exampleInputEmail1"> WHM PASSWORD </label>
<input type="text" class="form-control" name="passwhm" placeholder="Mật Khẩu WHM" value="<?=$query['passwhm'];?>">
</div>


<div class="form-group">
<label for="exampleInputEmail1"> Nameserver 1 </label>
<input type="text" class="form-control" name="dns1" placeholder="DNS 1" value="<?=$query['dns1'];?>">
</div>


<div class="form-group">
<label for="exampleInputEmail1"> Namerserver 2 </label>
<input type="text" class="form-control" name="dns2" placeholder="DNS 2" value="<?=$query['dns2'];?>">
</div>


<div class="form-group">
<label for="exampleInputEmail1"> IP Hosting </label>
<input type="text" class="form-control" name="ip" placeholder="ip" value="<?=$query['ip'];?>">
</div>

<div class="form-group">
<label for="exampleInputEmail1"> Hiển Thị </label>
<select class="form-control" name="status">
    
    <?php
    if($query['value'] == 'off'){
        ?>
        
        <option value="off"> Ẩn (Đang Chọn) </option>
        <option value="on"> Hiển Thị </option>
        <?php
    } else if($query['value'] == 'on'){
        ?>
        <option value="on"> Hiển Thị (Đang Chọn)</option>
            
    <option value="off"> Ẩn </option>

        <?php
    }
    ?>
    
</select>
</div>


<div class="form-group mb-0">
    
</div>
</div>

<div class="card-footer">
<button type="submit" name="submit" class="btn btn-primary"> Thêm Máy Chủ </button>
</div>
</form>
</div>
</div>

</div>






<div class="col-md-6">
<div class="card">
<div class="card-header">
<h3 class="card-title"> Danh Sách Máy Chủ </h3>
</div>
 <div class="table-responsive">
<div class="card-body">
<table class="table table-bordered">
<thead>
<tr>
<th>Tên Máy Chủ</th>
<th> Trạng Thái </th>
<th> IP </th>
<th style="width: 40px"> Thao Tác</th>
</tr>
</thead>
<tbody>

<?php
$topcloud = mysqli_query($connect, "SELECT * FROM ServerHost");
foreach($topcloud as $row){
    $id+=1;
    ?>

<tr>
<td> <?=inHoaString($row['name']);?> (<?=inHoaString($row['maychu']);?>) </td>
<td> <span class="badge bg-info"> <?=statushostadmin($row['status']);?> </span> </td>
<td>
    <?=$row['ip'];?></td>
<td><a href="?xoa=<?=$row['id'];?>" class="badge bg-danger"> Xóa </a> <a href="./editserver.php?id=1" onclick="delete(1)"><span class="badge bg-info"> Chỉnh Sửa </span> </a></td>
</tr>

    <?php
} if($id < 1){
    echo NodataTabled();
} else {
    echo '</tbody></table>';
}
?>


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
</div></section>

</div>


<?php
include('Footer.php');
?>