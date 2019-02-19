<?php
  $ime = $_POST['ime'];
  $brend = $_POST['brend'];
  $cijena = $_POST['cijena'];
  $ram = $_POST['ram'];
  $kapacitet = $_POST['kapacitet'];
  $kamera = $_POST['kamera'];
  $slika = $_POST['slika'];
  $status = $_POST['status'];

  $conn = mysqli_connect("localhost", "root", "", "web-shop");

  if(!$conn) {
      die("Neuspješno povezivanje na bazu");
  }

  $sql = "INSERT INTO uredaji (uredaj_id, uredaj_ime, uredaj_brend, uredaj_cijena, uredaj_ram, uredaj_kapacitet, uredaj_kamera, uredaj_slika, uredaj_status) VALUES (NULL, '$ime', '$brend', '$cijena', '$ram', '$kapacitet', '$kamera', '$slika', '$status')";

  if(mysqli_query($conn, $sql)){
      header("location: admin.php#!/uredaji");
  }else {
      echo "Neuspješno upisivanje u bazu1 ";
  }

  mysqli_close($conn);



?>