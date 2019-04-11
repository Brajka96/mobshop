<?php
    session_start(); // Starting Session
    $error = ''; //prazna varijabla za ispisivanje greske
    if(isset($_POST['login'])){
        if(empty($_POST['user']) || empty($_POST['pass'])){
            $error="Nije upisano korisničko ime ili šifra";
        }
        else{
            //Definiramo $user & $pass
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $user_type = $_POST['user_type'];

            //spajamo se na bazu
            $conn = mysqli_connect("localhost", "root", "", "mobshop");
            $user = stripslashes($user);
            $pass = stripslashes($pass);
            $user = mysqli_real_escape_string($conn, $user);
            $pass = mysqli_real_escape_string($conn, $pass);

            //sql upit za izvlačenje podataka
            $query = mysqli_query($conn, "SELECT * FROM korisnik WHERE SIFRA='$pass' AND KORISNICKO_IME='$user' AND USER_TYPE='$user_type' ");
            
            $rows = mysqli_num_rows($query);
            if($rows==1){
                $_SESSION['login_user'] = $user;
                $_SESSION['user_type'] = $user_type;
            }
            else{
                $error="Korisničko ime ili šifra nisu točni";
            }
            mysqli_close($conn);//zatvaranje konekcije
        }
    }
?>