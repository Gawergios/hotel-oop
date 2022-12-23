<?php


class controller
{
    public $con;
    function __construct()
    {
        $this->con = mysqli_connect("localhost", "root", "", "hotels");
    }
}


class insert extends controller
{
    public $q;


    function hotel($hotel, $stars,$description,$img)
    {
        $this->q = mysqli_query($this->con, "INSERT INTO `hotels` (`name`, `stars`,`description`,`img`) VALUES ('$hotel','$stars','$description','$img')");
    }
    function room($code, $net_price, $taxes, $taxes_type, $total, $curency,$img, $hotel_id)
    {
        $this->q = mysqli_query($this->con, "INSERT INTO `rooms`(`code`, `net_price`, `taxes`, `taxes_type`, `total`, `currency`, `img`, `hotel_id`) VALUES ('$code', '$net_price','$taxes','$taxes_type','$total','$curency','$img','$hotel_id')");
    }
    
    function hotelimg($table, $img, $hotel_id)
    {
        $this->q = mysqli_query($this->con, "INSERT INTO $table (`hotel_img`,`hotel_id`) VALUES ('$img','$hotel_id')");
    }
    function roomimg($table, $img, $room_id)
    {
        $this->q = mysqli_query($this->con, "INSERT INTO $table (`room_img`,`room_id`) VALUES ('$img','$room_id')");
    }
}


class selectall extends controller
{
    public $q;
    function select($table)
    {
        $this->q = mysqli_query($this->con, "SELECT * FROM $table");
        
    }

    function selectwhere($table,$id)
    {
        $this->q = mysqli_query($this->con, "SELECT * FROM $table WHERE id=$id ");
    }

    function innerjoin($table1, $table2, $col1, $col2)
    {
        $this->q = mysqli_query($this->con, "SELECT * FROM `$table1` INNER JOIN `$table2` where $table1.$col1 = $table2.$col2 ");
    
}
function innerjoinimg($img ,$table1, $table2, $col1, $col2)
    {
        $this->q = mysqli_query($this->con, "SELECT `$img` FROM `$table1` INNER JOIN `$table2` where $table1.$col1 = $table2.$col2 ");
}
}


class update extends controller

{
    public $q;
    function updaterooms( $code,$net_price, $taxes , $taxes_type ,$total,$currency, $hotel_id,$id)
    {
        $this->q = mysqli_query($this->con, "UPDATE `rooms` SET `code`='$code',`net_price`='$net_price',`taxes`='$taxes', `taxes_type` = '$taxes_type' , `total`='$total' , `currency`='$currency' ,`hotel_id`='$hotel_id' WHERE `id`='$id'");
        
    }

    function updatehotels($name, $stars, $description, $id)
    {
        $this->q = mysqli_query($this->con, "UPDATE `hotels` SET `name`='$name' , `stars`='$stars' , `description`='$description' WHERE `id`='$id'");
    }
}







class delete extends controller{
    public $q;
    function delete($table, $id){
        $this->q = mysqli_query($this->con, "DELETE FROM `$table` where `id` = '$id' ");
    }

}


