<?php
include('../System/Header.php');
echo Title('Danh Sách Giao Diện');
?>

<div class="content">
<h2 class="intro-y text-lg font-medium mt-10"> Thiết Kế Website </h2>
<div class="grid grid-cols-12 gap-6 mt-5">

<?php
$hanhdepchai = mysqli_query($connect, "SELECT * FROM Template");
foreach($hanhdepchai as $row){
    ?>

<div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
<div class="box">
<div class="p-5">
<div class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
<img alt="MPhat Dzai:)" class="rounded-md" src="<?=$row['image'];?>">
<div class="absolute bottom-0 text-white px-5 pb-6 z-10">
<a href="" class="block font-medium text-base"> <?=inHoaString($row['name']);?> </a>
</div>
</div>
<div class="text-slate-600 dark:text-slate-500 mt-5">
<div class="flex items-center">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="link" data-lucide="link" class="lucide lucide-link w-4 h-4 mr-2"><path d="M10 13a5 5 0 007.54.54l3-3a5 5 0 00-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 00-7.54-.54l-3 3a5 5 0 007.07 7.07l1.71-1.71"></path></svg> Giá Tiền: <?=Monney($row['price']);?> <sup>đ</sup>
</div>
<div class="flex items-center mt-2">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="layers" data-lucide="layers" class="lucide lucide-layers w-4 h-4 mr-2"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg> Lượt Tạo: <?=Monney($row['datao']);?>
</div>
</div>
</div>




<div class="flex justify-center items-center p-5 border-t border-slate-200/60 dark:border-darkmode-400">
<button class="btn btn-pending text-white" onclick="window.location.href='/order/web/<?=$row['id'];?>';"> Tạo Ngay - <?=Monney($row['price']);?> <sup>đ</sup></button>
</div>
</div>
</div>

    
    <?php
}
?>

</div>
</div>

<?php
include('../System/Footer.php');
?>