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
<h1> Cài Đặt Gạch Thẻ </h1>
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
 <h3 class="card-title"> Cài Đặt Gạch Thẻ </h3>
</div>


<div>
    
    
<div class="card-body">
    <form action method="post">
<div class="form-group">
<label for="exampleInputEmail1"> PARTNER KEY (<a href="//doithe1s.vn" class="text-primary" target="_blank"> DOITHE1S.VN </a>) </label>
<input type="text" class="form-control" name="partnerkey" value="<?=$configcard['partnerkey'];?>">
</div>

<div class="form-group">
<label for="exampleInputEmail1"> PARTNER ID (<a href="//doithe1s.vn" class="text-primary" target="_blank"> DOITHE1S.VN </a>) </label>
<input type="text" class="form-control" name="partnerid" value="<?=$configcard['partnerid'];?>">
</div>


<div class="form-group">
<label for="exampleInputEmail1"> LINK CALLBACK </label>
<input type="text" class="form-control" value="https://<?=$_SERVER['SERVER_NAME'];?>/callback" disabled>
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
    mysqli_query($connect, "UPDATE Settings SET partnerkey = '".$_POST['partnerkey']."', partnerid = '".$_POST['partnerid']."' WHERE id = '1'");
    echo swal('Thành Công','success');
    echo redirect('');
}
include('Footer.php');
?>