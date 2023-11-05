<?php
include('Header.php');

if($getUser['level'] != 'admin'){
    echo loadto('/');
}

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $amount = $_POST['amount'];
    
    $query = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM Users WHERE username = '$username'"));
    if(empty($username) || empty($amount)){
        echo swal('Hãy Nhập Đầy Đủ Các Ô','error');
    } else if($username != $query['username']){
        echo swal('Tên Người Nhận Không Đúng','error');
    } else {
        mysqli_query($connect, "UPDATE Users SET monney = monney + '$amount' WHERE username = '$username'");
        echo swal('Cộng Thành Công '.Monney($amount).' Cho Tài Khoản '.inHoaString($username).' ','success');
        echo redirect('');
    }
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
    
    
<div class="card card-primary">
<div class="card-header">
<h3 class="card-title"> Cộng Tiền Thành Viên </h3>
</div>

<form action="" method="post">
    
<div class="card-body">
<div class="form-group">
<label for="exampleInputEmail1"> Tên Tài Khoản Nhận </label>
<input type="text" class="form-control" name="username" placeholder="Nhập Tài Khoản Nhận Tiền">
</div>
<div class="form-group">
<label for="exampleInputPassword1"> Số Tiền </label>
<input type="number" class="form-control" name="amount" placeholder="Số Tiền">
</div>
</div>

<div class="card-footer">
<button name="submit" type="submit" class="btn btn-primary"> Cộng Tiền </button>
</div>

</form>

</div>

</div>
</section></div>


<?php
include('Footer.php');
?>