<?php

require_once("lib/controller.php");

session_start();
if (empty($_SESSION['user'])) {
    header("LOCATION:login.php");
}
$error = "";
$success = "";
if (isset($_POST['save']) && isset($_POST['stars']) && isset($_POST['description'])) {

    $hotel_name = $_POST['name'];
    $stars = $_POST['stars'];
    $description = $_POST['description'];

    $imgname = $_FILES['img']['name'];
    $tmp = $_FILES['img']['tmp_name'];
    $error = $_FILES['img']['error'];
    $sizee = $_FILES['img']['size'];
    $imgtype = $_FILES['img']['type'];
    $upload = move_uploaded_file($tmp, "../img/" . $imgname);

    if ($upload) {
        $ins = new insert();
        $ins->hotel($hotel_name, $stars, $description, $imgname);
        $success = "Data saved";
        
    } else {
        $error = "fill in all data right";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>hotel</title>

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
                                <i class="nav-icon far fa-circle text-warning"></i>
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
                                <i class="nav-icon far fa-circle text-danger"></i>
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
                                <?php if (!empty($error)) : ?>
                                    <div style="background-color: rgba(255,0,0, .1); ">
                                        <h5>Alert!</h5>
                                        <?= "<p> - $error </p>"; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($success)) : ?>
                                    <div style="background-color: rgba(0,0,255, .1); ">
                                        <?= "<h5> - $success </h5>"; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="card-body">
                                    <form action="addhotels.php" method="post" enctype="multipart/form-data">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">hotel name</label>
                                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="hotel name">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">stars</label>
                                                <input type="text" name="stars" class="form-control" id="exampleInputEmail1" placeholder="stars">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">description</label>
                                                <input type="text" name="description" class="form-control" id="exampleInputEmail1" placeholder="description">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">hotel image</label>
                                                <input type="file" name="img" class="form-control" id="exampleInputEmail1" placeholder="choose image">
                                            </div>
                                        </div>

                                        <div class="card-footer">
                                            <input type="submit" value="save" name="save" class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

       

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
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