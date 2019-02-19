<?php

    $conn = mysqli_connect("localhost", "root", "", "web-shop");
    $data = json_decode(file_get_contents("php://input"));
    $ime = $data->ime;
    $slika = $data->slika;
    $cijena = $data->cijena;
    if(!$conn) {
        die("Neuspješno povezivanje na bazu");
    }
  
    $sql = "INSERT INTO korpa (id, slika, ime, cijena) VALUES ('', '$slika', '$ime', '$cijena')";
  
    if(mysqli_query($conn, $sql)){
        echo "Uspjesno";
        header("location:../shop.php");
    }else {
        echo "Neuspješno upisivanje u bazu test!";
    }
  
    mysqli_close($conn);



?>