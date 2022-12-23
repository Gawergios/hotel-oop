<?php

require_once("lib/authcontroller.php");


if (isset($_POST["name"])) {



    $userName = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $repassword = $_POST["repassword"];
    $phone = $_POST["phone"];

    $error = [];
    if (empty($userName)) {
        $error[] = "name is require";
    }
    if (empty($email)) {
        $error[] = "email is require";
    }
    if (empty($password)) {
        $error[] = "password is require";
    }
    if ($password != $repassword) {
        $error[] = "password not identical";
    }

    if (empty($error)) {
        $reg = new register();
        $reg->validate($userName, $email, $password, $phone);
        $error[] = "register successuflly";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>registeration page</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <?php if (!empty($error)) : ?>
                    <div style="background-color: rgba(255,0,0, .1); ">
                        <h5>Alert!</h5>
                        <?php foreach ($error as $e) {
                            echo "<p> - $e </p>";
                        }
                        ?>
                    </div>
                <?php endif; ?>
                <p>Register a new membership</p>
                <form action=" register.php" method="POST" class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Full Name">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <input type="password" name="repassword" class="form-control" placeholder="Repassword">
                        <input type="phone" name="phone" class="form-control" placeholder="Phone Number">
                        <input type="submit" name="register" class="btn btn-success" value="register">
                        <div>
                            <a href="login.php">login page</a>
                        </div>
                        </form>
                    </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>