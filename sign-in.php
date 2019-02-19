<?php

    include("model/login.php");//uključujemo login
		if(isset($_SESSION['login_user'])){
		if($_SESSION["login_user"] == "admin"){
			header("Location: administrator/admin.php");//preusmjeravanje na drugu stranicu
		}else{
		    $_SESSION["visit"] = 1;
			header("location: user.php");
		}
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prijava</title>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <link rel="stylesheet" href="css/sign-in.css?newversion">

    <style>
    
        @media(max-width: 600px) {
    .form-container {
        width: 90%;
        margin: 50px auto;
    }
    
    .reg-message {
        width: 90%;
        box-shadow: 2px 2px 12px 0px black;
    }
}
    </style>

</head>

<body>

    <nav>
    <div class="nav-wrapper">
      <div class="col s12">
        <a href="index.php" class="waves-effect waves-light btn"><- Home</a>
      </div>
    </div>
  </nav>
  <?php if(isset($_SESSION['mes'])){ ?>
<div class="reg-message"><?php echo $_SESSION['mes']; ?></div>
<?php unset($_SESSION['mes']); } ?>
    <div class="row form-container">
        <div class="col s12">
            <ul class="tabs">
                <li class="tab col s12 m5"><a href="#test1">Registracija</a></li>
                <li class="tab col s12 m5"><a class="active" href="#test2">Prijava</a></li>

            </ul>
        </div>
        <div id="test1" class="col s12">
            <form action="model/dodaj_korisnika.php" method="POST" class="col s12 sign-in-form">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="ime" name="ime" type="text" class="validate">
                        <label for="ime">Ime</label>
                    </div>
                </div>
                <div class="row">
                <div class="input-field col s12">
                        <input id="prez" name="prez" type="text" class="validate">
                        <label for="prez">Prezime</label>
                    </div>
                </div>
             
                <div class="row">
                    <div class="input-field col s12">
                        <input name="email" id="email" type="email" class="validate">
                        <label for="email">Email</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input name="kori" id="kori" type="text" class="validate">
                        <label for="kori">Korisničko ime</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="pass" name="pass" type="password" class="validate">
                        <label for="pass">Šifra</label>
                    </div>
                </div>
                <button type="submit" class="btn waves-effect waves-light">Potvrdi</button>
            </form>
        </div>
        <div id="test2" class="col s12">
            <form method="POST" class="col s12 sign-in-form">
                
                <div class="row">
                    <div class="input-field col s12">
                        <input id="kori1" name="user"  type="text" class="validate">
                        <label for="kori1">Korisničko ime</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="pass1" name="pass" type="password" class="validate">
                        <label for="pass1">Šifra</label>
                    </div>
                </div>
                <input id="form-btn" type="submit" class="btn waves-effect waves-light" value="Prijava" name="login">
                 
                    <h6 style="color:red; text-align: right"><?php echo $error; ?></h6>

            </form>
        </div>

    </div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <!-- Compiled and minified JavaScript -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
        $(document).ready(function () {
           
            $(".tabs").tabs()
            
        });
    </script>
    
</body>

</html>