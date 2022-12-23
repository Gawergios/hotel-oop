<?php
session_start();
require_once("lib/controller.php");
if (empty($_SESSION['user'])) {
    header("LOCATION:login.php");
}

$id=$_GET['id'];
$del = new delete();
$del->delete("hotels","$id");

header("LOCATION:allhotels.php");
