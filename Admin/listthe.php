<?php
include('Header.php');
if($getUser['level'] != 'admin'){
    echo loadto('/');
}

?>

<div class="content-wrapper" style="min-height: 2171.31px;">

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1> Danh Sách Thẻ Cào </h1>
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
<h3 class="card-title"> Danh Sách Thẻ Cào </h3>
</div>
 <div class="table-responsive">
<div class="card-body">
<table class="table table-bordered">
<thead>
<tr>
    
<th> Người Nạp </th>
<th> Mã Thẻ </th>
<th> Serial </th>
<th> Loại Thẻ </th>
<th> Mệnh Giá </th>
<th> Thời Gian Nạp </th>
<th> Trạng Thái </th>
</tr>
</thead>
<tbody>

<?php 
$queryServer = mysqli_query($connect, "SELECT * FROM DataCard");
while($row = mysqli_fetch_assoc($queryServer)){
    $id+=1;
?>

<tr>
<td> <?=inHoaString($row['username']);?> </td>
<td> <?=$row['code'];?></td>
<td> <?=$row['serial'];?></td>
<td> <?=$row['telco'];?></td>
<td> <?=$row['amount'];?></td>
<td> <?=ToTime($row['time']);?></td>
<td> <?=StatusCard($row['status']);?></td>
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