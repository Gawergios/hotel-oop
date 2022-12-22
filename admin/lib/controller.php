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
        // foreach ($this->q as $data) {
        //     echo "<pre>";
        //     print_r($data);
        // }
    }

    function innerjoin($table1, $table2, $col1, $col2)
    {
        $this->q = mysqli_query($this->con, "SELECT * FROM `$table1` INNER JOIN `$table2` where $table1.$col1 = $table2.$col2 ");
    // foreach ($this->q as $data) {
    //     echo "<pre>";
    //     print_r($data);
   //}
}
function innerjoinimg($img ,$table1, $table2, $col1, $col2)
    {
        $this->q = mysqli_query($this->con, "SELECT `$img` FROM `$table1` INNER JOIN `$table2` where $table1.$col1 = $table2.$col2 ");
}
}


class update extends controller
{
    public $q;
    function update( $code,$net_price, $taxes,$taxes_type,$total,$currency, $hotel_id,$id)
    {
        $this->q = mysqli_query($this->con, "UPDATE `rooms` SET `code`='$code',`net_price`='$net_price',`taxes`='$taxes',`taxes_type`='$taxes_type',`total`='$total',`currency`='$currency',`hotel_id`='$hotel_id' WHERE `id`='$id'");
        
    }
}




// class selectid extends dbconnection
// {
//     public $q;
//     function select($table,$id,$idreq)
//     {
//         $this->q = mysqli_query($this->con, "select `id` from $table where $id = '$idreq'");
//         foreach ($this->q as $data) {
//             echo "<pre>";
//             print_r($data);
//         }
//     }
// }



class delete extends controller{
    public $q;
    function delete($table, $id){
        $this->q = mysqli_query($this->con, "DELETE FROM `$table` where `id` = '$id' ");
    }

}


// $con = new mysqli("localhost", "root", "", "blog");
// $q = $con->query("select * from `post`");





// function addNewUser($userName,$email,$password){
//     $connect = mysqli_connect("localhost", "root", "", "portfolio");
//     $query = "INSERT INTO `user`(`name`, `email`, `password`) VALUES ('$userName','$email','$password')";
//     mysqli_query($connect, $query);

//     $aff = mysqli_affected_rows($connect);
//     if ($aff == 1) {
//         header("LOCATION:home.php");
//     } else {
//         return false;
//     }
// }

// function login($email, $password)
// {
//     $connect = mysqli_connect("localhost", "root", "", "portfolio");
//     $query = "SELECT * FROM `user` WHERE `email` = '$email' && `password` = '$password'";
//     $myq = mysqli_query($connect, $query);
//     $res= mysqli_fetch_assoc($myq);
//     return $res;

// }




interface core
{

    public function select();
    public function update($data, $where);
    public function delete($where);
    public function insert($data);
}