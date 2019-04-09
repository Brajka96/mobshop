<?php
session_start();

  $ime = $_POST['ime'];
  $prez = $_POST['prez'];
  $email = $_POST['email'];
  $kori = $_POST['kori'];
  $pass = $_POST['pass'];
  $type = $_POST['user_type'];

  $conn = mysqli_connect("localhost", "root", "", "mobshop");

  if(!$conn) {
      die("Neuspješno povezivanje na bazu");
  }

  $sql = "INSERT INTO korisnik (ID, IME, PREZIME, EMAIL, KORISNICKO_IME, SIFRA, USER_TYPE) VALUES (NULL, '$ime', '$prez', '$email', '$kori', '$pass', '$type')";

  if(mysqli_query($conn, $sql)){
      $_SESSION['msg'] = "Uspješno dodan novi korisnik";
      $_SESSION['msgType'] = "success";
      header("location:admin.php#!/korisnici");
  }else {

      echo "Neuspješno upisivanje u bazu!";
  }

  mysqli_close($conn);



?>