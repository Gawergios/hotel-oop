<?php
session_start();
require_once("lib/controller.php");
if (empty($_SESSION['user'])) {
    header("LOCATION:login.php");
}
if (isset($_POST['code'])) {
    $id = $_POST['id'];
    $code = $_POST['code'];
    $net = $_POST['net_price'];
    $amount = $_POST['amount'];
    $currency = $_POST['currency'];
    $type = $_POST['type'];
    $total = $net + $amount;

     $imgname = $_FILES['img']['name'];
    $tmp = $_FILES['img']['tmp_name'];
    $error = $_FILES['img']['error'];
    $sizee = $_FILES['img']['size'];
    $imgtype = $_FILES['img']['type'];
    $upload = move_uploaded_file($tmp, "../img/" . $imgname);

if ($upload){

    $add = new insert();
    $add->room($code, $net, $amount, $type,  $total, $currency,$imgname, $id);
    header("LOCATION:addrooms.php");
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>rooms</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="design/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="design/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini layout-boxed">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">

                <li class="nav-item d-none d-sm-inline-block">
                    <a href="logout.php" class="nav-link">log out</a>
                </li>

            </ul>

            <!-- Right navbar links -->

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="../index.php" class="brand-link">
                <img src="design/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">details</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item">
                            <a href="addhotels.php" class="nav-link">
                                <i class="nav-icon far fa-circle text-danger"></i>
                                <p class="text">add hotels</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="hotelimgs.php" class="nav-link">
                                <i class="nav-icon far fa-circle text-danger"></i>
                                <p>add hotel imgs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="addrooms.php" class="nav-link">
                                <i class="nav-icon far fa-circle text-warning"></i>
                                <p>add rooms</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="roomimgs.php" class="nav-link">
                                <i class="nav-icon far fa-circle text-danger"></i>
                                <p>add room imgs</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="allhotels.php" class="nav-link">
                                <i class="nav-icon far fa-circle text-danger"></i>
                                <p>All hotels</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="allrooms.php" class="nav-link">
                                <i class="nav-icon far fa-circle text-danger"></i>
                                <p>All rooms</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">


            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- Default box -->
                            <div class="card">

                                <div class="card-body">
                                    <form action="addrooms.php" method="post" enctype="multipart/form-data">
                                        <div class="card-body">


                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">hotel id</label>
                                                    <input type="number" name="id" class="form-control" id="exampleInputEmail1" placeholder="hotel id">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">room code</label>
                                                    <input type="text" name="code" class="form-control" id="exampleInputEmail1" placeholder="room code">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">net price</label>
                                                    <input type="number" name="net_price" class="form-control" id="exampleInputEmail1" placeholder="net price">
                                                </div>


                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">taxes </label>
                                                    <input type="number" name="amount" class="form-control" id="exampleInputEmail1" placeholder="amount">
                                                    <input type="text" name="currency" class="form-control" id="exampleInputEmail1" placeholder="currency">
                                                    <input type="text" name="type" class="form-control" id="exampleInputEmail1" placeholder="type">
                                                </div>
                                                <div class="form-group">
                                                <label for="exampleInputPassword1">room image</label>
                                                <input type="file" name="img" class="form-control" id="exampleInputEmail1" placeholder="choose image">
                                                </div>



                                                <!-- <div class="form-group">
                                                    <label for="exampleInputFile">img</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="img" class="custom-file-input" id="exampleInputFile">
                                                            <label class="custom-file-label" for="exampleInputFile">Choose img</label>
                                                        </div>
                                                    </div>
                                                </div> -->
                                            </div>

                                            <div class="card-footer">
                                                <input type="submit" value="save" name="save" class="btn btn-primary">
                                            </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="design/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="design/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="design/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="design/dist/js/demo.js"></script>
</body>

</html>