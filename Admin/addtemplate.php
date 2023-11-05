


<?php
include('Header.php');

if(isset($_GET['delete'])){
    $deleTrue = mysqli_query($connect, "DELETE FROM Template WHERE id = '".$_GET['delete']."'");
    if($deleTrue){
        echo swal('Xóa Thành Công', 'success');
        sleep(2);
        echo redirect('./addtemplate.php');
    }
}


if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $decs = $_POST['decsription'];
    $price = $_POST['price'];
    
    if(isset($_FILES['image'])){
        $countfiles = count($_FILES['image']['name']);
        $urls = array();
        for($i=0;$i<$countfiles;$i++){
            $filename = $_FILES['image']['name'][$i];
            $uploadPath = '../media/'.$filename;
            move_uploaded_file($_FILES['image']['tmp_name'][$i], $uploadPath);
            $Path2 = explode("..", $uploadPath);
            $urls[] = $Path2['1']; 
        }
        
        $urlimage = implode(",", $urls); 
    } else {
        $urlimage = '';
    } 
    
    if(isset($_FILES['images'])){
        
    $countfiles = count($_FILES['images']['name']);
    $urls = array();
    for($i=0;$i<$countfiles;$i++){
        $filename = $_FILES['images']['name'][$i];
        $uploadPath = '../media/'.$filename;
        move_uploaded_file($_FILES['images']['tmp_name'][$i], $uploadPath);
        $Path2 = explode("..", $uploadPath);
        $urls[] = $Path2['1']; 
    }
    
    $urlString = implode(",", $urls); 
    
    } else {
       $urlString = '';  
    }
    
    $inTrue = mysqli_query($connect, "INSERT INTO `Template`(`id`, `name`, `description`, `image`, `images`, `price`) VALUES (NULL,'$name','$decs','$urlimage','$urlString','$price')");
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
 <h3 class="card-title"> Thêm Giao Diện </h3>
</div>


<div>
    
<form action="" enctype="multipart/form-data" method="POST">   
<div class="card-body">
    
<div class="form-group">
<label for="exampleInputEmail1"> Name </label>
<input type="text" class="form-control" name="name">
</div>


<div class="form-group">
<label for="exampleInputEmail1"> Mô Tả </label>
<textarea class="form-control" name="description"></textarea>
</div>

<!--<div class="form-group">-->
<!--<label for="exampleInputEmail1"> Chức Năng </label>-->
<!--<textarea class="form-control" name="chucnang"></textarea>-->
<!--</div>-->


<div class="form-group">
<label for="exampleInputEmail1"> 1 Ảnh Thumbnail </label>
<input type="file" name="image[]" class="form-control" multiple="">
</div>


<div class="form-group">
<label for="exampleInputEmail1"> Chọn Ảnh Mô Tả </label>
<input type="file" name="images[]" class="form-control" multiple="">
</div>


<div class="form-group">
<label for="exampleInputEmail1"> Giá Tiền </label>
<input type="number" class="form-control" name="price">
</div>

</div>


<div class="card-footer">
<button type="submit" name="submit" class="btn btn-primary"> Thêm </button>
</div>

</form>  

</div>
</div>
</div>





<div class="col-md-12">
<div class="card">
<div class="card-header">
<h3 class="card-title"> Danh Sách Giao Diện </h3>
</div>
 <div class="table-responsive">
<div class="card-body">
<table class="table table-bordered">
<thead>
<tr>
<th> Tên Giao Diện </th>
<th> Mô Tả </th>
<th> Ảnh </th>
<th> Giá Tiền </th>
<th style="width: 40px"> Thao Tác</th>
</tr>
</thead>
<tbody>

<?php
$result = mysqli_query($connect, "SELECT * FROM Template");
foreach($result as $row){
    $id+=1;
    ?>
    
<tr>
<td> <?=$row['name'];?> </td>
<td> <?=$row['description'];?></td>
<td> <img src="<?=$row['image'];?>" width="124px"> </td>
<td> <?=Monney($row['price']);?> <sup> đ </sup></td>
<td><a href="?delete=<?=$row['id'];?>" class="badge bg-danger"> Xóa </a> <a href="./editcode.php?id=<?=$row['id'];?>" class="badge bg-info"> Chỉnh Sửa </a></td>
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

</tbody>
</table>
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