<?php
  include('model/shop-session.php'); 
?>

<!DOCTYPE html>
<html lang="en" ng-app="shopApp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MobShop</title>
    <link rel="stylesheet" href="css/styles.css?newversion">
    <link rel="stylesheet" href="css/split.css">
    <link rel="stylesheet" href="css/shops.css?newversion">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">

    <script src="lib/angular.min.js"></script>

    <style>
       .category .list-group-item:hover {
   background: #ddd;
   cursor: pointer;
}

.fixed-nav-shop {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background: #fff;
    z-index: 1000 !important;
    padding: 15px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    transition: all 0.2s ease;
}

@media (max-width: 900px) {
    .shop-title {
        margin-top: 0px;
        margin-bottom: 50px;
    }
}
</style>


</head>

<body ng-controller="shopController">

    <!-- HEADER START -->
    <div class="toggle">
        <h1>Mob<span id="logo-span">Shop</span> </h1>
        <i class="fas fa-bars menu" aria-hidden="true"></i>
    </div>
    <div class="fixed-nav-shop toggle-list">
        <div class="wrapper">
            <nav id="navbar">
                <div class="logo">
                    <h1>Mob<span id="logo-span">Shop</span> </h1>
                </div>
                <ul id="nav-list">
                <li><i id="close-nav" class="fas fa-times-circle"></i></li>
                    <li><a href="user.php">Home</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="model/logout.php">Odjavi se</a></li>
                    <li id="list-cart"><a href="cart.php"><i class="fas fa-shopping-cart"></i><span id="cart-badge"
                                class="badge badge-light">{{cart.length}}</span></a></li>
                    <li>
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <?php echo (isset($_SESSION["login_user"])) ? $_SESSION["login_user"] : 'Guest'; ?> <i
                                    class="fas fa-user"></i> </a>

                            <?php 
      if(isset($_SESSION["login_user"])) {
        ?>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="model/logout.php">Odjavi se</a>
                            </div>

                            <?php }?>
                        </div>
                    </li>
                </ul>
                <div class="clear"></div>
            </nav>
        </div>
    </div>



    <!-- HEADER ENDS -->

    <div class="shop-title">
        <h2>KORPA</h2>
    </div>
    <main>
            <div class="container">
                <div ng-if="cart.length == 0" class="jumbotron jumbotron-fluid">
                    <div class="container">
                    <h1 class="display-4">Korpa je prazna</h1>
                    <p class="lead">Dodajte uređaje putem našeg shopa!</p>
                    <a href="shop.php" class="btn btn-primary">Shop</a>
                    </div>
                </div>
            <div class="table-responsive">    
            <table ng-show="cart.length > 0" id="cart-table" class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col"></th>
                        <th scope="col">Uređaj</th>
                        <th scope="col">Količina</th>
                        <th scope="col">Cijena</th>
                        <th scope="col">Ukupno</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="product in cart">
                        <td>{{product.id}}</td>
                        <td><img style="width: 50px; height:60px;" ng-src="css/phone-images/{{product.slika}}" alt="{{product.ime}}"></td>
                        <td>{{product.ime}}</td>
                        <td><input class="product-{{product.id}}-qty" type="number" value="1" min="1"></td>
                        <td>{{product.cijena}} KM</td>
                        <td class="product product-{{product.id}}-total">{{product.cijena}} KM</td>
                        <td><button class="btn btn-warning" ng-click="calculateDevice(product, product.id)">Promijeni</button> <button class="btn btn-danger" ng-click="deleteDevice(product)">Izbriši</button></td>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Ukupno: {{total}} KM</th>
                        <th></th>
                    </tr>       
                </tbody>
            </table>
            <button ng-show="cart.length > 0" ng-click="deleteAllDevices()" class="btn btn-danger"><i class="far fa-trash-alt"></i> Isprazni korpu</button>
            <a ng-show="cart.length > 0" style="margin: 20px 0" href="narudzba.php" class="btn btn-success btn-block"><i class="fas fa-shopping-cart"></i> Naruči</a>
            </div>
        </div>
    </main>

    <?php include('view/footer.php') ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    <script src="js/shop.js?newversion">

    </script>

     <script>
    $(document).ready(function() {
    $(".menu").click(function() {
        console.log("TEST")
        $(".fixed-nav-shop").toggleClass("active")
    })
    $("#close-nav").click(function() {
        console.log("TEST")
        $(".toggle-list").toggleClass("active")
    })
})</script>



</body>

</html>