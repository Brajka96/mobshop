<?php
$conn = mysqli_connect("localhost", "root", "", "web-shop");
session_start();// Pokretanje sesije
//Spremanje sesije

if(!isset($_SESSION['login_user'])){
    header("Location: index.php");
}
$user_check=$_SESSION['login_user'];

$query=mysqli_query($conn, "SELECT KORISNICKO_IME FROM korisnik WHERE KORISNICKO_IME='$user_check'");
$row = mysqli_fetch_assoc($query);
$login_session =$row['KORISNICKO_IME'];
if(!isset($login_session)){
mysqli_close($conn); // Zatvaranje konekcije
}
?>
