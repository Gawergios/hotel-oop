<?php


require_once("lib/authcontroller.php");

session_start();


if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $login = new login();
    $login->val("users", $email, $password);
    $userdata = mysqli_fetch_assoc($login->q);

    if (isset($userdata) > 0) {
        $_SESSION['user'] = $userdata;
        header("LOCATION:addhotels.php");
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
    <title>login</title>
</head>


<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <form action="login.php" method="POST" class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="email">
                    <input type="password" name="password" class="form-control" placeholder="password">
                    <input type="submit" name="login" class="btn btn-success" value="sign in">
                    <div>
                        <a href='register.php'>Register a new membership</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
</body>
</html>


