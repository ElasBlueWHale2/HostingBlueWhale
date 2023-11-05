<?php
include('../System/Header.php');
echo Title('Mua Hosting Cpanel');
?>


<div class="intro-y flex items-center mt-8">
<h2 class="text-lg font-medium mr-auto"> Danh Sách Hosting </h2>
</div>

<div style="padding-top: 12px;"></div>

<div class="intro-y box">
<div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
<h2 class="font-medium text-base mr-auto"> Danh Sách Máy Chủ </h2>
</div>
<div id="basic-button" class="p-5">
<div class="preview">
    <?php
    $queryServer = mysqli_query($connect, "SELECT * FROM ServerHost WHERE value != 'off'");
    while($row = mysqli_fetch_assoc($queryServer)){
    ?>
    
    <a onclick="ChangePackage(<?=$row['id'];?>)" class="btn btn-dark"><?=$row['name'];?> <?=inHoaString($row['maychu']);?> </a><br>
    
    <?php } ?>

</div>

</div>
</div>


<div class="intro-y grid grid-cols-12 gap-6 mt-5 mt-5" id="nguyenthanh">
    
                   <?php
        $dataServer = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM ServerHost WHERE value != 'off'"));
        $result = mysqli_query($connect, "SELECT * FROM Plans WHERE maychu = '".$dataServer['maychu']."'");
        $id = 0;
        while($row = mysqli_fetch_assoc($result)){
            $id++;
        ?>


                        <div class="intro-y box col-span-12 md:col-span-6 lg:col-span-6 xl:col-span-4 px-5 py-16">
                       <center> <img src="/media/cPanel_orange.svg" width="195px"></center>
                <div class="text-xl font-medium text-center mt-10"> CPANEL - <?=inHoaString($row['planapi']);?> </div>
                <br>
                <center style="padding-top: 15px;">
                <ul> 
                 <li><b> Dung Lượng: <?=Monney($row['dungluong']);?> MB</b></li><br>
                 <li><b> Băng Thông: <?=$row['bangthong'];?></b> </li><br>
                 <li><b> Miền Khác: <?=$row['mienkhac'];?>  </b> </li><br>
                 <li><b> Miền Bí Danh : <?=$row['bidanh'];?>  </b> </li><br>
                 <li><b> Backup: <?=$row['backup'];?> </b> </li><br>
                 <li><b> Chứng Chỉ SSL: <?=$row['ssl'];?> </b> </li><br>
                </ul>
                </center>
                
                <br>
                <br>
                
                <div class="flex justify-center">
                </div>
                        <center><a onclick="window.location.href='/Order/Cpanel/<?=$row['id'];?>';" class="btn btn-pending w-100"> Mua Ngay - <?=Monney($row['price']);?> <sup>đ</sup> </a></center>
                </div>  
                <?php } ?>
            </div>
                                                
                                                
                                    
                   
                   
                           
        <script>
            function ChangePackage(id){
                <?php foreach($queryServer as $row){
                    ?>
                    
                    if(id == '<?=$row['id'];?>'){
                        document.getElementById('nguyenthanh').innerHTML = `
                        
                        <?php
                        $result = mysqli_query($connect, "SELECT * FROM Plans WHERE maychu = '".$row['maychu']."'");
                        foreach($result as $rowz){
                            $dataServer = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM ServerHost WHERE maychu = '".$rowz['maychu']."'"));
                        ?>
                        
                        <div class="intro-y box col-span-12 md:col-span-6 lg:col-span-6 xl:col-span-4 px-5 py-16">
                       <center> <img src="/media/cPanel_orange.svg" width="195px"></center>
                <div class="text-xl font-medium text-center mt-10"> CPANEL - <?=inHoaString($rowz['planapi']);?> </div>
                <br>
                <center style="padding-top: 15px;">
                <ul> 
                 <li><b> Dung Lượng: <?=Monney($rowz['dungluong']);?> MB</b></li><br>
                 <li><b> Băng Thông: <?=$rowz['bangthong'];?></b> </li><br>
                 <li><b> Miền Khác: <?=$rowz['mienkhac'];?>  </b> </li><br>
                 <li><b> Miền Bí Danh: <?=$rowz['bidanh'];?>  </b> </li><br>
                 <li><b> Backup: <?=$rowz['backup'];?> </b> </li><br>
                 <li><b> Chứng Chỉ SSL: <?=$rowz['ssl'];?> </b> </li><br>
                </ul>
                </center>
                
                <br>
                <br>
                
                <div class="flex justify-center">
                </div>
                        <center><button onclick="window.location.href='/Order/Cpanel/<?=$rowz['id'];?>';" class="btn btn-pending w-100"> Mua Ngay - <?=Monney($rowz['price']);?> <sup>đ</sup> </button></center>
                </div>  
                
                        
                        
                        <?php } ?>
                    
                        `;
                    }
                    
                    <?php 
                } ?>
                
            }
        </script>
        
                                    
<?php
include('../System/Footer.php');
?>