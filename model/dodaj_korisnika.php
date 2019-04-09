<?php
session_start();

  $ime = $_POST['ime'];
  $prez = $_POST['prez'];
  $email = $_POST['email'];
  $kori = $_POST['kori'];
  $pass = $_POST['pass'];
  $user_type = 'user';
  $conn = mysqli_connect("localhost", "root", "", "mobshop");


  if(!$conn) {
      die("Neuspješno povezivanje na bazu");
  }

  $sql = "INSERT INTO `korisnik` (`ID`, `IME`, `PREZIME`, `EMAIL`, `KORISNICKO_IME`, `SIFRA`, `USER_TYPE`) VALUES (NULL, '$ime', '$prez', '$email', '$kori', '$pass', '$user_type')";


  if(mysqli_query($conn, $sql)){
      $_SESSION['mes'] = "Uspješna registracija! Prijavite se za pristup shopu";
      header("location:../sign-in.php");
  }else {
      echo "Neuspješno upisivanje u bazu ";
  }

  mysqli_close($conn);



?>