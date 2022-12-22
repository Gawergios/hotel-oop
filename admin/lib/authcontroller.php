<?php

class connect
{
    public $con;
    function __construct()
    {
        $this->con = mysqli_connect("localhost", "root", "", "hotels");
    }
}

class register extends connect
{

    public $q;
    function validate($name, $email, $password, $phone)
    {
        $this->q = mysqli_query($this->con, "INSERT INTO `users`(`name`, `email`, `password`,`phone`) VALUES ('$name','$email','$password','$phone')");
    }
}

class login extends connect
{
public $q;

function val($table, $email, $password)
{
$this->q = mysqli_query($this->con, "select * from $table where `email` = '$email' && `password` = '$password'");
}
}