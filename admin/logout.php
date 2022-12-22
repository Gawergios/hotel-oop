<?php
session_start();


session_destroy();
if(isset($_SESSION['user'])){
    header("LOCATION:login.php");
}

?>
