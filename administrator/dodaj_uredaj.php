<?php
session_start();
  $ime = $_POST['ime'];
  $brend = $_POST['brend'];
  $cijena = $_POST['cijena'];
  $ram = $_POST['ram'];
  $kapacitet = $_POST['kapacitet'];
  $kamera = $_POST['kamera'];
  $slika = $_POST['slika'];

  $conn = mysqli_connect("localhost", "root", "", "mobshop");

  if(!$conn) {
      die("Neuspješno povezivanje na bazu");
  }

  $sql = "INSERT INTO uredaji (uredaj_id, uredaj_ime, uredaj_brend, uredaj_cijena, uredaj_ram, uredaj_kapacitet, uredaj_kamera, uredaj_slika) VALUES (NULL, '$ime', '$brend', '$cijena', '$ram', '$kapacitet', '$kamera', '$slika')";

  if(mysqli_query($conn, $sql)){
      $_SESSION['msg'] = "Uspješno dodan novi uređaj";
      $_SESSION['msgType'] = "success";
      header("location: admin.php#!/uredaji");
  }else {
      echo "<div style='background:red; width: 70%; padding: 50px;color: white;margin: 40px auto;'>Neuspješno upisivanje u bazu - unešena cijena nije ispravna <a href='admin.php'>vrati se na admina</a></div>";
  }

  mysqli_close($conn);



?>