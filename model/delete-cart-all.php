<?php 

$connect = mysqli_connect("localhost", "root", "", "web-shop");

    $query = "DELETE FROM `korpa`";
    if(mysqli_query($connect, $query)){
        header("location:../cart.php");
    } else {
        header("location:../shop.php");
    }


mysqli_close($connect);

?>