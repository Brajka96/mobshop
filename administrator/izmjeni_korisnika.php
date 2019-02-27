<?php
session_start();

$id = $_POST['ID'];
$ime = $_POST['newIme'];
$prez = $_POST['newPrez'];
$email = $_POST['newEmail'];
$kori = $_POST['newKori'];
$pass = $_POST['newPass'];

  $conn = mysqli_connect("localhost", "root", "", "mobshop");

  if(!$conn) {
      die("Neuspješno povezivanje na bazu");
  }

  $sql = "UPDATE `korisnik` SET `IME` = '$ime', `PREZIME` = '$prez', `EMAIL` = '$email', `KORISNICKO_IME`= '$kori', `SIFRA` = '$pass' WHERE `korisnik`.`ID` = '$id'";

  if(mysqli_query($conn, $sql)){
      $_SESSION['msg'] = "Uspješno ažuriran korisnik";
      $_SESSION['msgType'] = "warning";
      header("location:admin.php#!/korisnici");
  }else {
      echo "Neuspješno upisivanje u bazu";
  }

  mysqli_close($conn);



?>