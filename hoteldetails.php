<?php
$id = $_GET['id'];
require_once("admin/lib/controller.php");

$hotel = new selectall();
$hotel->select("hotels where id=$id");
foreach($hotel->q as $data)
{
    $hotel = $data['name'];
    $stars = $data['stars'];
    $description = $data['description'];
    $img = $data['img'];    
} 

$all = new selectall();
$all->innerjoinimg("hotel_img","hotels", "hotel_img", "id", "hotel_id && hotel_id = $id");

$rooms = new selectall();
$rooms->innerjoin("hotels","rooms", "id","hotel_id && hotel_id = $id");

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
    <title>hotel details</title>
    <style>
    </style>
</head>

<body>

  

    <section class="about py-5" id="about">
        <div class="container">
            <div class="row">
                <div class="col-10 mx-auto col-md-6 my-5">
                    <h1 class="text-capitalize">hotel<strong class="banner-title ">  <?= $hotel; ?></strong></h1>
                    <h3> stars :- <?= $stars; ?></h3>
                    <h3> description :- <?= $description; ?></h3>               
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
          <h1 class="text-capitalize">hotel <strong class="banner-title ">images</strong></h1>
        </div>
      </div>
      <div class="row" class="store-items" id="store-items">
    <?php foreach ($all->q as $data): ?>
      <div class="col-10 col-sm-6 col-lg-4 mx-auto my-3 store-item sweets" data-item="sweets">
          <div class="card ">
            <div class="img-container">
              <img src="img/<?=$data['hotel_img'] ?>" class="card-img-top store-img" alt="">
            </div>
          </div> 
        </div>
    <?php endforeach; ?>
    </div>      
    </div>
</section>


<section id="store" class="store py-5">
    <div class="container">
      <div class="row">
        <div class="col-10 mx-auto col-sm-6 text-center">
            <h1 class="text-capitalize">hotel <strong class="banner-title ">rooms</strong></h1>
        </div>
      </div>
      <div class="row" class="store-items" id="store-items">
           <?php foreach($rooms->q as $d) : ?>
                    <div class="col-10 col-sm-6 col-lg-4 mx-auto my-3 store-item sweets" data-item="sweets">
                        <div class="card ">
                            <div class="img-container">
                                <a href="roomdetails.php?id=<?= $d['id']; ?> "><img src="img/<?= $d['img']; ?>" class="card-img-top store-img" alt=""></a>
                                <span class="store-item-icon">
                                    <i class="fas fa-shopping-cart"></i>
                                </span>
                            </div>
                            <div class="card-body">
                                <div class="card-text d-flex justify-content-between text-capitalize">
                                    <h5 id="store-item-name"><?= $d['code']; ?></h5>
                                    <h5 class="store-item-value"><?= $d['net_price'] ?><strong id="store-item-price" class="font-weight-bold"><?= $d['currency'] ?></strong></h5>
                                </div>
                            </div>
                        </div>
                        <!-- end of card-->
                    </div>
                <?php endforeach; ?>
           </div>
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