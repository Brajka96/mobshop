<?php
session_start();

  $ime = $_POST['ime'];
  $prez = $_POST['prez'];
  $email = $_POST['email'];
  $kori = $_POST['kori'];
  $pass = $_POST['pass'];

  $conn = mysqli_connect("localhost", "root", "", "web-shop");

  if(!$conn) {
      die("Neuspješno povezivanje na bazu");
  }

  $sql = "INSERT INTO `korisnik` (`ID`, `IME`, `PREZIME`, `EMAIL`, `KORISNICKO_IME`, `SIFRA`) VALUES (NULL, '$ime', '$prez', '$email', '$kori', '$pass')";


  if(mysqli_query($conn, $sql)){
      $_SESSION['mes'] = "Uspješna registracija! Prijavite se za pristup shopu";
      header("location:../sign-in.php");
  }else {
      echo "Neuspješno upisivanje u bazu ";
  }

  mysqli_close($conn);



?>