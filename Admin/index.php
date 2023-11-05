<?php
include('Header.php');

$hosting = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM Hosting"));

$checkngay = mysqli_query($connect, "SELECT * FROM DataCard WHERE status = '1' AND time2 = '".date('d/m/Y')."'");
while($row = mysqli_fetch_assoc($checkngay)){
    $doanhthuhnaycard = $doanhthuhnaycard + $row['amount'];
}

$checkngay = mysqli_query($connect, "SELECT * FROM SaveMomo WHERE status = '1' AND time2 = '".date('d/m/Y')."'");
while($row = mysqli_fetch_assoc($checkngay)){
    $doanhthummhnay = $doanhthummhnay + $row['price'];
}

$dt1 = $doanhthuhnaycard + $doanhthummhnay;



# Doanh Thu Tháng

$checkngay = mysqli_query($connect, "SELECT * FROM DataCard WHERE status = '1' AND time3 = '".date('m/Y')."'");
while($row = mysqli_fetch_assoc($checkngay)){
    $dththangcard = $dththangcard + $row['amount'];
}

$checkngay = mysqli_query($connect, "SELECT * FROM SaveMomo WHERE status = '1' AND time3 = '".date('m/Y')."'");
while($row = mysqli_fetch_assoc($checkngay)){
    $dtmimisthang = $dtmimisthang + $row['price'];
}

$dt2 = $dththangcard + $dtmimisthang;


# Tổng Doanh Thu 

$checkngay = mysqli_query($connect, "SELECT * FROM DataCard WHERE status = '1'");
while($row = mysqli_fetch_assoc($checkngay)){
    $xxxxxxxxxxxxxxxxxxxxxx = $xxxxxxxxxxxxxxxxxxxxxx + $row['amount'];
}

$checkngay = mysqli_query($connect, "SELECT * FROM SaveMomo WHERE status = '1'");
while($row = mysqli_fetch_assoc($checkngay)){
    $xxxxxxx = $xxxxxxx + $row['price'];
}

$ttd = $xxxxxxx + $xxxxxxxxxxxxxxxxxxxxxx;



# Thống Kê Shop 

$shop1 = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM DataWeb WHERE status = '0'"));
$shop2 = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM DataWeb WHERE status = '1'"));
$shop3 = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM DataWeb WHERE status = '2'"));
$shop4 = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM DataWeb WHERE status = '3'"));
?>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
    
    <?php if($getUser['level'] == 'admin'){
        ?>
        
           
        <div class="row">
          <div class="col-lg-3 col-6">
            
            <div class="small-box bg-info">
              <div class="inner">
                <h3> <?=Monney($hosting);?> </h3>

                <p> Hosting Hoạt Động </p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            
            <div class="small-box bg-success">
              <div class="inner">
                <h3> <?=Monney($dt1);?> <sup style="font-size: 20px">đ</sup></h3>

                <p> Doanh Thu Hôm Nay </p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            
            <div class="small-box bg-warning">
              <div class="inner">
                <h3> <?=Monney($dt2);?> <sup>đ</sup> </h3>

                <p> Doanh Thu Tháng </p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            
            <div class="small-box bg-danger">
              <div class="inner">
                <h3> <?=Monney($ttd);?> <sup> đ </sup></h3>

                <p>Tổng Doanh Thu</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


    
    
     

    
      <div class="col-lg-3 col-6">
            
            <div class="small-box bg-info">
              <div class="inner">
                <h3> <?=$shop1;?> </h3>

                <p> Shop Chờ Duyệt </p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            
            <div class="small-box bg-success">
              <div class="inner">
                <h3> <?=$shop2;?> </h3>

                <p> Shop Hoạt Động </p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            
            <div class="small-box bg-warning">
              <div class="inner">
                <h3> <?=$shop3;?> </h3>

                <p> Shop Chờ Gia Hạn </p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            
            <div class="small-box bg-danger">
              <div class="inner">
                <h3> <?=$shop4;?> </h3>

                <p> Shop Hết Hạn </p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
              
              </div>

<?php } else if($getUser['level'] == 'ctv'){
    
    ?>
    


        <div class="row">

    
      <div class="col-lg-3 col-6">
            
            <div class="small-box bg-info">
              <div class="inner">
                <h3> <?=$shop1;?> </h3>

                <p> Shop Chờ Duyệt </p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            
            <div class="small-box bg-success">
              <div class="inner">
                <h3> <?=$shop2;?> </h3>

                <p> Shop Hoạt Động </p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            
            <div class="small-box bg-warning">
              <div class="inner">
                <h3> <?=$shop3;?> </h3>

                <p> Shop Chờ Gia Hạn </p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            
            <div class="small-box bg-danger">
              <div class="inner">
                <h3> <?=$shop4;?> </h3>

                <p> Shop Hết Hạn </p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
              
        <?php
    }
    ?>


        </div>
      
        
    </section>
  </div>

<?php
include('Footer.php');
?>
