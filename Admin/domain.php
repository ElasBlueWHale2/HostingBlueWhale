<?php
include('Header.php');

if($getUser['level'] != 'admin'){
    echo loadto('/');
}

if(isset($_GET['delete'])){
    $deleTrue = mysqli_query($connect, "DELETE FROM DuoiMien WHERE id = '".$_GET['delete']."'");
    if($deleTrue){
        echo swal('Xóa Thành Công', 'success');
        sleep(2);
        echo redirect('./domain.php');
    }
}

if(isset($_POST['submit'])){
    $domain = $_POST['domain'];
    $amount = $_POST['amount'];
    
    if(empty($domain) || empty($amount)){
        echo swal('Hãy Nhập Đầy Đủ Các Ô','error');
    } else {
       $intrue = mysqli_query($connect, "INSERT INTO `DuoiMien`(`id`, `domain`, `price`) VALUES (NULL,'$domain','$amount')");
       if($intrue){
        echo swal('Thêm Miền Thành Công','success');
        echo redirect('');
       } else {
           echo swal('Thêm Miền Thất','error');
            echo redirect('');
       }
        
    }
}

?>


<div class="content-wrapper" style="min-height: 767.207px;">

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1> Quản Lý Đuôi Miền </h1>
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
    
    
<div class="row">
    
<div class="card card-primary col-md-6">
<div class="card-header">
<h3 class="card-title"> Thêm Đuôi Miền </h3>
</div>

<form action="" method="post">
    
<div class="card-body">
<div class="form-group">
<label for="exampleInputEmail1"> Miền (VD: com) </label>
<input type="text" class="form-control" name="domain" placeholder="Miền (VD: com)">
</div>
<div class="form-group">
<label for="exampleInputPassword1"> Số Tiền </label>
<input type="number" class="form-control" name="amount" placeholder="Số Tiền">
</div>
</div>

<div class="card-footer">
<button name="submit" type="submit" class="btn btn-primary"> Thêm Ngay </button>
</div>

</form>

</div>


<div class="col-md-6">
<div class="card">
<div class="card-header">
<h3 class="card-title"> Danh Sách Miền </h3>
</div>
 <div class="table-responsive">
<div class="card-body">
<table class="table table-bordered">
<thead>
<tr>
<th> Miền </th>
<th> Giá Tiền </th>
<th style="width: 40px"> Thao Tác</th>
</tr>
</thead>
<tbody>

<?php
$hanhcd = mysqli_query($connect, "SELECT * FROM DuoiMien");
foreach($hanhcd as $row){
    $id+=1;
    ?>
    
<tr>
<td> <?=inHoaString($row['domain']);?> </td>
<td> <?=Monney($row['price']);?> <sup> đ </sup></td>
<td><a href="?delete=<?=$row['id'];?>" class="badge bg-danger"> Xóa </a></td>
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

</div>
</section></div>


<?php
include('Footer.php');
?>