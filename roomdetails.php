<?php
$id = $_GET['id'];
require_once("admin/lib/controller.php");

$room = new selectall();
$room->select("rooms where id=$id");
foreach($room->q as $data)
{
    
    $code = $data['code'];
    $net_price = $data['net_price'];
    $taxes = $data['taxes'];
    $taxes_type = $data['taxes_type'];
    $total = $data['total'];
    $currency = $data['currency'];
    $img = $data['img'];

} 

$all = new selectall();
$all->innerjoin("rooms", "room_img", "id", "room_id && room_id = $id");


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- bootstrap css -->
<link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- main css -->
  <link rel="stylesheet" href="css/style.css">

  <!-- font awesome -->
  <link rel="stylesheet" href="css/all.css">
    <title>room details</title>
    <style>
    </style>
</head>

<body>

  

    <section class="about py-5" id="about">
        <div class="container">
            <div class="row">
                <div class="col-10 mx-auto col-md-6 my-5">
                    <h1 class="text-capitalize">room code<strong class="banner-title ">  <?= $code; ?></strong></h1>
                    <h3> price :- <?= $net_price." ". $currency; ?></h3>
                    <h3> taxes :- <?= $taxes. " " .$taxes_type; ?></h3>
                    <h3> total :- <?= $total. " " .$currency; ?></h3>
                    
                                  
                </div>
                <div class="col-10 mx-auto col-md-6 align-self-center my-5">
                    <div class="about-img__container">
                        <img src="img/<?= $img; ?>" class="img-fluid" alt="">
                    </div>
                </div> 
            </div>
        </div>
    </section>



<section id="store" class="store py-5">
    <div class="container">
      <div class="row">
        <div class="col-10 mx-auto col-sm-6 text-center">
          <h1 class="text-capitalize">room <strong class="banner-title ">images</strong></h1>
        </div>
      </div>
      <div class="row" class="store-items" id="store-items">
    <?php foreach ($all->q as $data): ?>
      <div class="col-10 col-sm-6 col-lg-4 mx-auto my-3 store-item sweets" data-item="sweets">
          <div class="card ">
            <div class="img-container">
              <img src="img/<?=$data['room_img'] ?>" class="card-img-top store-img" alt="">
            </div>
          </div> 
        </div>
    <?php endforeach; ?>
    </div>      
    </div>
</section>


    <!-- jquery -->
    <script src="design/js/jquery-3.3.1.min.js"></script>
    <!-- bootstrap js -->
    <script src="design/js/bootstrap.bundle.min.js"></script>
    <!-- script js -->
    <script src="design/js/app.js"></script>
</body>

</html>