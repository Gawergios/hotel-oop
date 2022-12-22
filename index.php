<?php

require_once("admin/lib/controller.php");
$all = new selectall();
$all->select("hotels");
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
    <title>hotels</title>
</head>
<body>
    <!-- store -->
    <section id="store" class="store py-5">
        <div class="container">
            <!-- store  items-->
            <div class="row" class="store-items" id="store-items">
                <!-- single item -->
                <?php foreach ($all->q as $data) : ?>
                    <div class="col-10 col-sm-6 col-lg-4 mx-auto my-3 store-item sweets" data-item="sweets">
                        <div class="card ">
                            <div class="img-container">
                                <a href="hoteldetails.php?id=<?= $data['id']; ?> "><img src="img/<?= $data['img']; ?>" class="card-img-top store-img" alt=""></a>
                                <span class="store-item-icon">
                                    <i class="fas fa-shopping-cart"></i>
                                </span>
                            </div>
                            <div class="card-body">
                                <div class="card-text d-flex justify-content-between text-capitalize">
                                    <h5 id="store-item-name"><?= $data['name']; ?></h5>
                                    <h5 class="store-item-value"><?= $data['stars'] ?><strong id="store-item-price" class="font-weight-bold">stars</strong></h5>
                                </div>
                            </div>
                        </div>
                        <!-- end of card-->
                    </div>
                <?php endforeach; ?>
                
                <!-- end of card-->
            </div>
        </div>
    </section>

    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/api.js"></script>
</body>

</html>