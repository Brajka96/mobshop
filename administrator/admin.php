<?php
include('../model/session.php');
?>

<!DOCTYPE html>
<html lang="en" ng-app="adminApp">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administrator</title>
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">
  <script src="../lib/angular.min.js"></script>
  <script src="../lib/angular-route.min.js"></script>

 </head>

<body ng-controller="adminController">

  <main ng-view></main>

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="admin.js?newversion"></script>
  
  <script>
      setTimeout(function() {
        $(".myAlert").alert('close');
    }, 4200);
  </script>

</body>

</html>