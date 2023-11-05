<?php
include('System/Header.php'); 
$hosting = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM Hosting WHERE username = '".$getUser['username']."'"));
$web = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM DataWeb WHERE username = '".$getUser['username']."'"));
$webdite = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM DataWeb WHERE username = '".$getUser['username']."' AND status = '2'"));
$hostingdie = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM Hosting WHERE username = '".$getUser['username']."' AND status = '2'"));
$hethan = $webdie + $hostingdie;

echo Title('BWG - TẠO SHOP GIÁ RẺ, CUNG CẤP HOSTING HÀNG ĐẦU VIỆT NAM');
?>

                <div class="grid grid-col-12 gap-6">
        <div class="col-span-12 2xl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5"> Trang Khách Hàng </h2>
                        <a onclick="LoadData()" class="ml-auto flex items-center text-primary">
                            <i data-lucide="refresh-ccw" class="w-4 h-4 mr-3"></i> Làm Mới  </a>
                    </div>
                    
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="shopping-cart" class="report-box__icon text-primary"></i>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6"> <?=Monney($hosting);?> </div>
                                    <div class="text-base text-slate-500 mt-1"> Hosting </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="package" class="report-box__icon text-pending"></i>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6"> <?=Monney($web);?> </div>
                                    <div class="text-base text-slate-500 mt-1"> Trang Web </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="dollar-sign" class="report-box__icon text-warning"></i>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6"> <?=Monney($getUser['monney']);?> <sup>đ </sup></div>
                                    <div class="text-base text-slate-500 mt-1"> Số Dư </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="alert-circle" class="report-box__icon text-success"></i>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6"> <?=Monney($hethan);?> </div>
                                    <div class="text-base text-slate-500 mt-1"> Chờ Gia Hạn </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                

                
    <script>
        function sendMessage() {
            var message = document.getElementById('message').value;
            if (message.trim() !== '') {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById('message').value = '';
                    }
                };
                xmlhttp.open('GET', '/savechat?message=' + encodeURIComponent(message) + '&username=<?=$getUser['username'];?>', true);
                xmlhttp.send();
            }
        }

        function loadMessages() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('chatbox').innerHTML = this.responseText;
                }
            };
            xmlhttp.open('GET', '/chatload', true);
            xmlhttp.send();
        }

        setInterval(function() {
            loadMessages();
        }, 1000);
    </script>
</head>



<div class="intro-y col-span-12 lg:col-span-8 2xl:col-span-12" onload="loadMessages()">
<div class="chat__box box">
<div class="h-full flex flex-col" style="">
<div class="flex flex-col sm:flex-row border-b border-slate-200/60 dark:border-darkmode-400 px-5 py-4">
<div class="flex items-center">
<div class="w-10 h-10 sm:w-12 sm:h-12 flex-none image-fit relative">
<img alt="MinhPhat Adminstator" class="rounded-full" src="https://yt3.googleusercontent.com/fAasrizW-Du1dMFposc4-YvnNL1FTTLodqEl8q5JW-kWkUvRWZ23iL43g3nnAD1juzVc6MlO4Uo=s900-c-k-c0x00ffffff-no-rj">
</div>
<div class="ml-3 mr-auto">
<div class="font-medium text-base"> BOX CHAT 💭 </div>
<div class="text-slate-500 text-xs sm:text-sm"> Admin - TaMinhPhat</div>
</div>
</div>
</div>


<div class="nguyenthanh" style="padding-left: 10px" id="chatbox"></div>


<div class="pt-4 pb-10 sm:py-4 flex items-center border-t border-slate-200/60 dark:border-darkmode-400">
<textarea class="chat__box__input form-control dark:bg-darkmode-600 h-16 resize-none border-transparent px-5 py-3 shadow-none focus:border-transparent focus:ring-0" rows="1" placeholder="Nhập tin nhắn..." id="message"></textarea>


<a onclick="sendMessage()" class="w-8 h-8 sm:w-10 sm:h-10 block bg-primary text-white rounded-full flex-none flex items-center justify-center mr-5">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="send" data-lucide="send" class="lucide lucide-send w-4 h-4"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
</a>
</div>
</div>
<div class="h-full flex items-center" style="display: none;">
<div class="mx-auto text-center">
<div class="w-16 h-16 flex-none image-fit rounded-full overflow-hidden mx-auto">
<img alt="MinhPhat Adminstator" src="https://rubick.left4code.com/dist/images/profile-2.jpg">
</div>
<div class="mt-3">
<div class="font-medium">Hey, Al Pacino!</div>
<div class="text-slate-500 mt-1">Please select a chat to start messaging.</div>
</div>
</div>
</div>
</div>
</div>


                
    </div>
</div>


</div>


<style>
       .nguyenthanh {
      height: 300px; 
      width: 100%;
      overflow-y: scroll; 
    }
  </style>


<?php
include('System/Footer.php');
?>