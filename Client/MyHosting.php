<?php
include('../System/Header.php');
echo Title('Danh Sách Hosting');
?>




<div class="content">
<div class="intro-y flex items-center mt-8">
<h2 class="text-lg font-medium mr-auto"> Quản Lý Hosting </h2>
</div>

<div class="intro-y box mt-5">
<div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
<h2 class="font-medium text-base mr-auto"> Danh Sách Hosting </h2>
</div>


<div class="p-5" id="responsive-table">
<div class="preview">
<div class="overflow-x-auto">
<table class="table">
<thead>
<tr>
<th class="whitespace-nowrap">#</th>
<th class="whitespace-nowrap"> Tên Miền </th>
<th class="whitespace-nowrap"> Ngày Đăng Ký </th>
<th class="whitespace-nowrap"> Ngày Hết Hạn </th>
<th class="whitespace-nowrap"> Trạng Thái </th>
<th class="whitespace-nowrap"> Thao Tác </th>
</tr>
</thead>
<tbody>
    
    <?php
    $danhsach = mysqli_query($connect, "SELECT * FROM Hosting WHERE username = '".$getUser['username']."'");
    while($row = mysqli_fetch_assoc($danhsach)){
        $id+=1;
    ?>
<tr>
<td class="whitespace-nowrap"><?=$id;?></td>
<td class="whitespace-nowrap"> <a href="https://<?=AntiXss($row['domain']);?>" target="_blank" class="text-b"> <?=AntiXss($row['domain']);?> </a></td>
<td class="whitespace-nowrap"><?=ToTime($row['time']);?></td>
<td class="whitespace-nowrap"><?=ToTime($row['hsd']);?></td>
<td class="whitespace-nowrap"> <?=StatusHosting($row['status']);?> </td>
<td class="whitespace-nowrap">
<button class="btn btn-pending" onclick="window.location.href='/datahost/<?=$row['id'];?>';"> Quản Lý </button>
</td>
</tr>

<?php } if($id < 1){ echo NodataTabled(); } else { echo '
</tbody>
</table>'; } ?>


</div>
</div>

</div>
</div>


</div>




<?php
include('../System/Footer.php');
?>