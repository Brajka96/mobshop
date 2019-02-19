<?php
  $id = $_POST['id'];
  $ime = $_POST['novoIme'];
  $brend = $_POST['noviBrend'];
  $cijena = $_POST['novaCijena'];
  $ram = $_POST['noviRam'];
  $kapacitet = $_POST['noviKapacitet'];
  $kamera = $_POST['novaKamera'];
  $slika = $_POST['novaSlika'];
  $status = $_POST['noviStatus'];

  $conn = mysqli_connect("localhost", "root", "", "web-shop");

  if(!$conn) {
      die("Neuspješno povezivanje na bazu");
  }

  $sql = "UPDATE `uredaji` SET `uredaj_id` = '$id', `uredaj_ime` = '$ime', `uredaj_brend` = '$brend', `uredaj_cijena` = '$cijena', `uredaj_ram`= '$ram', `uredaj_kapacitet` = '$kapacitet', `uredaj_kamera` = '$kamera', `uredaj_slika` = '$slika', `uredaj_status` = '$status' WHERE `uredaji`.`uredaj_id` = '$id'";


  if(mysqli_query($conn, $sql)){
      header("location: admin.php#!/uredaji");
  }else {
      echo "Neuspješno upisivanje u bazu $ime";
  }

  mysqli_close($conn);



?>