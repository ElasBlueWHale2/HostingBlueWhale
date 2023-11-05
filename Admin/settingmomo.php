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
<h1> Cài Đặt Momo </h1>
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

<div class="col-md-12">

<div class="card card-primary">
<div class="card-header">
 <h3 class="card-title"> Cài Đặt Nạp MOMO </h3>
</div>


<div>
    
    
<div class="card-body">
    <form action method="post">
<div class="form-group">
<label for="exampleInputEmail1"> TOKEN (<a href="//api.dichvudark.vn" class="text-primary" target="_blank"> API.DICHVUDARK.VN </a>) </label>
<input type="text" class="form-control" name="token" value="<?=$configmomo['token'];?>">
</div>

<div class="form-group">
<label for="exampleInputEmail1"> CHỦ TÀI KHOẢN </label>
<input type="text" class="form-control" name="namemomo" value="<?=$configmomo['name'];?>">
</div>


<div class="form-group">
<label for="exampleInputEmail1"> SỐ TÀI KHOẢN </label>
<input type="text" class="form-control" name="number" value="<?=$configmomo['stk'];?>">
</div>

</div>

<div class="card-footer">
<button name="submit" type="submit" class="btn btn-primary"> Cập Nhật </button>
</div>
</form>
</div>
</div>
</div>

</div>

</div>
</section></div>

<?php

if(isset($_POST['submit'])){
    $token = $_POST['token'];
    $namemomo = $_POST['namemomo'];
    $number = $_POST['number'];
    
    mysqli_query($connect, "UPDATE Settings SET namemomo = '$namemomo', tokenmomo = '$token', numberacc = '$number' WHERE id = '1'");
    echo swal('Thành Công','success');
    echo redirect('');
}
include('Footer.php');
?>