<?php 

$connect = mysqli_connect("localhost", "root", "", "web-shop");
$data = json_decode(file_get_contents("php://input"));

if(count($data) > 0) {
    $id = $data->id;
    $query = "DELETE FROM `korpa` WHERE `korpa`.`id` = $id";
    if(mysqli_query($connect, $query)){
        header("location:../cart.php");
    } else {
        echo "Neuspješno brisanje";
    }
}

mysqli_close($connect);

?>