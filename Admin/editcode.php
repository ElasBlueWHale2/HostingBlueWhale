


<?php
include('Header.php');
$id = $_GET['id'];
$query = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM Template WHERE id = '$id'"));

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $decs = $_POST['description'];
    $price = $_POST['price'];
    $urlimage = $_POST['image'];
    $urlString = $_POST['images'];
    
    $inTrue = mysqli_query($connect, "UPDATE `Template` SET `name`='$name',`description`='$decs',`image`='$urlimage',`images`='$urlString',`price`='$price' WHERE id = '$id'");
    if($inTrue){
        echo swal('Thành Công!','success');
        echo redirect('');
    } else {
        echo swal('Thất Bại','error');
    }
}
?>

?>

<div class="content-wrapper" style="min-height: 767.207px;">

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1> Quản Lý Giao Diện </h1>
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

<div class="card card-primary">
<div class="card-header">
 <h3 class="card-title"> Chỉnh Sửa Giao Diện </h3>
</div>


<div>
    
<form action="" enctype="multipart/form-data" method="POST">   
<div class="card-body">
    
<div class="form-group">
<label for="exampleInputEmail1"> Name </label>
<input type="text" class="form-control" name="name" value="<?=$query['name'];?>">
</div>


<div class="form-group">
<label for="exampleInputEmail1"> Mô Tả </label>
<textarea class="form-control" name="description"><?=$query['description'];?></textarea>
</div>

<div class="form-group">
<label for="exampleInputEmail1"> 1 Ảnh Thumbnail </label>
<textarea class="form-control" name="image"><?=$query['image'];?></textarea>
</div>


<div class="form-group">
<label for="exampleInputEmail1"> Chọn Ảnh Mô Tả </label>
<textarea class="form-control" name="images"><?=$query['images'];?></textarea>
</div>


<div class="form-group">
<label for="exampleInputEmail1"> Giá Tiền </label>
<input type="number" class="form-control" name="price" value="<?=$query['price'];?>">
</div>

</div>


<div class="card-footer">
<button type="submit" name="submit" class="btn btn-primary"> Thêm </button>
</div>

</form>  

</div>
</div>
</div>

</div>
</div></section>

</div>

<?php
include('Footer.php');
?>