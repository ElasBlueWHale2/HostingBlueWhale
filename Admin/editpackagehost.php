<?php
include('Header.php');

if($getUser['level'] != 'admin'){
    echo loadto('/');
}

$id = $_GET['id'];
$query = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM Plans WHERE id = '$id'"));

if(isset($_POST['submit'])){
    $maychu = $_POST['maychu'];
    $disk = $_POST['disk'];
    $bangthong = $_POST['bangthong'];
    $addon = $_POST['addondomain'];
    $sub = $_POST['subdomain'];
    $bk = $_POST['backup'];
    $package = $_POST['package'];
    $price = $_POST['price'];
    $ssl = $_POST['ssl'];
    
   $intrue = mysqli_query($connect, "UPDATE `Plans` SET `dungluong`='$disk',`ssl`='$ssl',`bangthong`='$bangthong',`mienkhac`='$addon',`bidanh`='$sub',`maychu`='$maychu',`backup`='$bk',`planapi`='$package',`price`='$price' WHERE id = '$id'");
    
    if($intrue){
        echo swal('Thành Công','success');
        echo redirect('');
    } else {
        echo swal('Thất Bại', 'error');
    }
    
}
?>


<div class="content-wrapper" style="min-height: 767.207px;">

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1> Quản Lý Gói </h1>
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
 <h3 class="card-title"> Chỉnh Sửa Gói Hosting </h3>
</div>


<div>
<div class="card-body">
    <form action method="post">
<div class="form-group">
<label for="exampleInputEmail1"> Chọn Máy Chủ </label>
<select class="form-control" name="maychu">
    
    <option value="<?=$query['maychu'];?>"> <?=inHoaString($query['maychu']);?> (Đang Chọn) </option>
    
<?php
$dv = mysqli_query($connect, "SELECT * FROM ServerHost WHERE value != 'off'");
foreach($dv as $row){
?>

    <option value="<?=$row['maychu'];?>"> <?=inHoaString($row['name']);?> (<?=inHoaString($row['maychu']);?>)  </option>
    
    <?php } ?>
        
</select>
</div>


<div class="form-group">
<label for="exampleInputEmail1"> Dung Lượng </label>
<input type="text" class="form-control" name="disk" value="<?=$query['dungluong'];?>">
</div>


<div class="form-group">
<label for="exampleInputEmail1"> Băng Thông </label>
<input type="text" class="form-control" name="bangthong" value="<?=$query['bangthong'];?>">
</div>

<div class="form-group">
<label for="exampleInputEmail1"> Miền Khác </label>
<input type="text" class="form-control" name="addondomain" value="<?=$query['mienkhac'];?>">
</div>

<div class="form-group">
<label for="exampleInputEmail1"> Miền Con </label>
<input type="text" class="form-control" name="subdomain" value="<?=$query['bidanh'];?>">
</div>

<div class="form-group">
<label for="exampleInputEmail1"> SSL </label>
<input type="text" class="form-control" name="ssl" value="<?=$query['ssl'];?>">
</div>

<div class="form-group">
<label for="exampleInputEmail1"> Backup </label>
<input type="text" class="form-control" name="backup" value="<?=$query['backup'];?>">
</div>

<div class="form-group">
<label for="exampleInputEmail1"> Tên Package (Định Dạng VD: USERNAME_VN1 Thì Chỉ Nhập VN1) </label>
<input type="text" class="form-control" name="package" value="<?=$query['planapi'];?>">
</div>

<div class="form-group">
<label for="exampleInputEmail1"> Giá Tiền </label>
<input type="text" class="form-control" name="price" value="<?=$query['price'];?>">
</div>


</div>

<div class="card-footer">
<button type="submit" name="submit" class="btn btn-primary"> Thêm Gói </button>
</div>
 </form>
</div>
</div>
</div>





<div class="col-md-6">
<div class="card">
<div class="card-header">
<h3 class="card-title"> Danh Sách Gói </h3>
</div>
 <div class="table-responsive">
<div class="card-body">
<table class="table table-bordered">
<thead>
<tr>
<th> Tên Máy Chủ </th>
<th> Tên Gói </th>
<th> Giá Tiền </th>
<th style="width: 40px"> Thao Tác</th>
</tr>
</thead>
<tbody>

<?php
$hanhcd = mysqli_query($connect, "SELECT * FROM Plans");
foreach($hanhcd as $row){
    $id+=1;
    ?>
    
    
<tr>
<td> <?=inHoaString($row['maychu']);?> </td>
<td> <?=inHoaString($row['planapi']);?> </td>
<td> <?=Monney($row['price']);?> <sup> đ </sup></td>
<td><a href="?delete=<?=$row['id'];?>" class="badge bg-danger"> Xóa </a> <a href="./editpackagehost.php?id=<?=$row['id'];?>" onclick="delete(1)"><span class="badge bg-info"> Chỉnh Sửa </span> </a></td>
</tr>

    
    <?php
} if($id < 1){
    echo NodataTabled();
} else {
    echo '
</tbody>
</table>';
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