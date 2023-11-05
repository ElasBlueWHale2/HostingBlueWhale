<?php
include('../System/Header.php');
echo Title('Nạp Tiền Qua Ví/ Ngân Hàng');
?>


<div class="content">
                <div class="intro-y flex items-center mt-5">
                    <div class="quochuy">
                        <h2 class="font-bold text-2xl mr-auto">
                            NẠP TIỀN QR &amp; CHUYỀN KHOẢN
                        </h2>
                    </div>
                </div>
                <!-- BEGIN: Pricing Tab -->
                <div class="grid grid-cols-12 gap-5">
                                            <div class="col-span-12 lg:col-span-6 2xl:col-span-6">
                            <div class="report-box-2 intro-y mt-12 sm:mt-5">
                                <div class="box sm:flex">
                                    <div class="flex flex-col justify-center flex-1">
                                        <div class="flex flex-col sm:flex-row justify-center items-center p-2 border-b border-gray-200">
                                            <h2 class="font-bold text-xl">
                                                Chuyển khoản bằng mã QR
                                            </h2>
                                        </div>
                                        <div class="py-4">
                                            <p class="text-center px-3"> Quét Mã QR Qua Ứng Dụng MOMO </p>                                            <br>
                                            <div class="flex justify-center">
                                            <image class="mt-3"> <?=file_get_contents($configmomo['qrcode']);?></image>
                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col justify-center flex-1 border-t sm:border-t-0 sm:border-l border-slate-200 dark:border-darkmode-300 border-dashed">
                                        <div class="intro-y flex-1 lg:mb-0">
                                            <div class="flex flex-col sm:flex-row justify-center items-center p-2 border-b border-gray-200">
                                                <h2 class="font-bold text-xl">
                                                    Chuyển Khoản thủ công
                                                </h2>
                                            </div>
                                            <div class="py-4">
                                                <div style="height:60px;">
                                                    <img src="https://upload.wikimedia.org/wikipedia/vi/f/fe/MoMo_Logo.png" class="mx-auto" width="45">
                                                </div>

                                                <table class="table table-sm">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <strong>Tài Khoản :</strong>
                                                                <br>
                                                            </td>
                                                            <td class="text-left payment-instruction">
                                                                <div>
                                                                    <span> <?=$configmomo['name'];?> </span>
                                                                    <br>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <strong>Số tài khoản :</strong>
                                                            </td>
                                                            <td class="text-left payment-instruction">
                                                                <strong>
                                                                    <span style="color:red;"> <?=$configmomo['stk'];?> </span>
                                                                </strong>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <strong>Ví điện tử :</strong>
                                                                <br>
                                                            </td>
                                                            <td class="text-left payment-instruction">
                                                                <div>
                                                                    <span> MOMO </span>
                                                                    <br>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <strong>Nội dung :</strong>
                                                            </td>
                                                            <td class="text-left payment-instruction">
                                                                <strong>
                                                                    <span style="color:red; text-transform: lowercase;"> <?=$getUser['username'];?> </span>
                                                                </strong>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                    </div>
                                    
                                    
                                    
<br>

                <div class="intro-y box mt-5">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
                <h2 class="font-medium text-base mr-auto"> Lịch Sử Nạp Tiền </h2>
                </div>
                
                
                <div class="p-5" id="responsive-table">
                <div class="preview">
                <div class="overflow-x-auto">
                <table class="table">
                <thead>
                <tr>
                <th class="whitespace-nowrap">#</th>
                <th class="whitespace-nowrap"> Mã Giao Dịch </th>
                <th class="whitespace-nowrap"> Số Tiền </th>
                <th class="whitespace-nowrap"> Tài Khoản Nạp </th>
                <th class="whitespace-nowrap"> Thời Gian </th>
                <th class="whitespace-nowrap"> Trạng Thái </th>
                </tr>
                </thead>
                <tbody>
                    
                    <?php
                    $danhsach = mysqli_query($connect, "SELECT * FROM SaveMomo WHERE noidung = '".$getUser['username']."'");
                    while($row = mysqli_fetch_assoc($danhsach)){
                        $id+=1;
                    ?>
                <tr>
                <td class="whitespace-nowrap"><?=$id;?></td>
                <td class="whitespace-nowrap"> <?=$row['requestid'];?> </td>
                <td class="whitespace-nowrap"> <?=Monney($row['price']);?> </td>
                <td class="whitespace-nowrap"><?=$row['nameBank'];?></td>
                <td class="whitespace-nowrap"><?=ToTime($row['time']);?></td>
                <td class="whitespace-nowrap"> <?=StatusMomo($row['status']);?> </td>
                </tr>
                
                <?php } if($id < 1){ echo NodataTabled(); } else { echo '
                </tbody>
                </table>'; } ?>
                
                
                </div>
                </div>
                
                </div>
                </div>
                






                <div class="col-span-12 lg:col-span-4 xxl:col-span-3">
                    <div class="intro-y box lg:mt-5">
                        <div class="flex flex-col lg:flex-row items-center p-5">
                            <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                                <a href="" class="font-medium">HƯỚNG DẪN NẠP TIỀN</a>
                                <br><br>
                                <div class="class=" font-medium""=""><strong>Bước 1:</strong> Mở App Ngân hàng hoặc Website
                                    ngân hàng để thực hiển chuyển tiền.</div>

                                <div class="class=" font-medium""=""><strong>Bước 2:</strong> Chọn Ngân hàng, nhập chính
                                    xác số tài khoản và số tiền muốn nạp.</div>
                                <div class="class=" font-medium""=""><strong>Bước 3:</strong> Nhập chính xác nội dung
                                    chuyển tiền như yêu cầu, <strong> và tiền nạp phải lớn hơn 5,100đ</strong>.</div>
                                <div class="class=" font-medium""=""><strong>Bước 4:</strong> Thực hiện chuyển tiền.</div>
                                <div class="class=" font-medium""=""><strong>Bước 5:</strong> Sau khi kiểm tra, hệ thống sẽ
                                    hiển thị xác nhận và cộng tiền vào tài khoản cho quý khách.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Pricing Content -->
            </div>
            

<?php
include('../System/Footer.php');
?>