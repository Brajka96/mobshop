<?php 

$connect = mysqli_connect("localhost", "root", "", "web-shop");
$data = json_decode(file_get_contents("php://input"));

if(count($data) > 0) {
    $id = $data->id;
    $query = "DELETE FROM `korisnik` WHERE `korisnik`.`ID` = $id";
    if(mysqli_query($connect, $query)){
        echo 'Data deleted';
        header("location:admin.php#!/uredaji");
    } else {
        echo 'ERROR';
    }
}

mysqli_close($connect);

?>