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
    <link rel="stylesheet" href="css/styles.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
    <link rel="stylesheet" href="css/split.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">
    <link rel="stylesheet" href="css/shops.css?newversion">
    
    <script src="lib/angular.min.js"></script>

    <style>
    
    .row{
        margin-right: 0;
    }
        .category .category-title {
    padding: 10px ;
    text-align: center;
    background: rgb(180, 27, 27) ;
    color: #fff ;
    cursor: pointer;
}

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
    z-index: 1000;
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

@media (max-width: 768px) {
    
    .row{
        margin-right: 0;
        margin-left: 0;
    }
    
    .shop-wrapper {
        margin: 0 15px 0 5px;
    }
    #seeMore {
        width: 100%;
        margin: 10px 0 30px 5px;
    }
}
    </style>

</head>

<body ng-controller="shopController">

    <!-- HEADER START -->
    <div class="toggle">
        <h1>Mob<span id="logo-span">Shop</span> </h1>
        <i class="fas fa-bars menu" aria-hidden="true"></i>
        <a href="cart.php"><i class="fas fa-shopping-cart"></i><span id="cart-badge"
                                class="badge badge-light">0</span></a>
    </div>
    <div class="toggle-list fixed-nav-shop">
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
                        <?php include('view/dropdown.php') ?>
                    </li>
                </ul>
                <div class="clear"></div>
            </nav>
        </div>
    </div>



    <!-- HEADER ENDS -->

    <div class="shop-title">
        <h2>SHOP</h2>
    </div>

    <main>
        <div class="shop-wrapper">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="list-group category">
                        <h3 class="category-title">Brend <i style="float:right" class="fas fa-sort"></i></h3>
                        <div class="list-group-item filter text-center" ng-repeat="brand in brands" ng-click="filterBrand(brand)">
                            <span>{{brand.uredaj_brend | uppercase}}</span>
                        </div>
                    </div>
                    <div class="list-group category">
                        <h3 class="category-title">Ram <i style="float:right" class="fas fa-sort"></i></h3>
     <div class="list-group-item filter text-center" ng-repeat="memory in ram" ng-click="filterRam(memory)">
                              <span>{{memory.uredaj_ram}}</span>
                        </div>
                    </div>
                    <div class="
                            list-group category">
                            <h3 class="category-title">Kapacitet <i style="float:right" class="fas fa-sort"></i></h3>
                            <div class="list-group-item filter text-center" ng-repeat="memory in storage" ng-click="filterStorage(memory)">
                                <span>{{memory.uredaj_kapacitet}}</span>
                            </div>
                        </div>
                    </div>
                    <div id="allPhones" class="col-lg-9 col-md-9 col-12 shop-products">
                        <div class="product-category">
                            <input type="text" class="form-control form-control-lg bg-light" ng-model="searchProduct" id="search"
                                aria-describedby="searchHelp" placeholder="Pronađi uređaj"> <br>
                            <div class="sort-options">
                                <span>
                                    <h5>Poredaj po: </h5>
                                </span>
                                <button ng-click="order = 'uredaj_cijena'" class="btn btn-warning">Cijena</button>
                                <button ng-click="order = 'uredaj_ime'" class="btn btn-warning">Ime</button>
                                <button ng-click="products = allProducts; order = 'uredaj_id'" class="btn btn-warning">Prikaži
                                    sve</button>
                            </div>

                        </div>
                        <div id="test" class="row phones">

                            <div class="col-12 col-lg-4 col-md-6 phone" ng-repeat="product in products | filter: searchProduct | orderBy: order | limitTo: phonesLimit">
                                <div class="product-top text-center">
                                    <img ng-src="css/phone-images/{{product.uredaj_slika}}" alt="product-1">
                                    <div class="overlay">
                                        <button type="button"
                                            class="btn btn-info" ng-click="display(product)" rel="tooltip" data-placement="left" title="Vidi detalje" data-toggle="modal" data-target="#exampleModal" tooltip>
                                            <i class="fa fa-eye"></i>
                                        </button>



                                        <button type="button" ng-click="addToCart(product)" class="btn btn-info" rel="tooltip" data-placement="left" title="Dodaj u korpu" tooltip>
                                            <i class="fa fa-shopping-cart"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="product-bottom text-center">
                                    <h4>{{product.uredaj_ime}}</h4>
                                    <p>{{product.uredaj_cijena | currency: 'KM '}}</p>
                                </div>

                            </div>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{active.uredaj_ime |
                                                uppercase}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <img ng-src="css/phone-images/{{active.uredaj_slika}}" alt="">
                                                </div>
                                                <div class="col-lg-7 offset-lg-1">
                                                    <ul class="list-group">
                                                        <li class="list-group-item" ng-repeat="(key,val) in active | limitTo: 7">
                                                            {{key.split("_")[1] | uppercase}}: {{val}}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
                                            <button type="button" ng-click="addToCart(active)" class="btn btn-primary"><i class="fas fa-shopping-cart"></i>
                                                Dodaj u korpu</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button id="seeMore" ng-click="seeMore()" class="btn btn-secondary">Prikaži sve</button>
                    </div>

                </div>
            </div>
    </main>

    <?php include('view/footer.php') ?>
    
    <div class="buyMessage"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>
    <script src="js/main.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
    <script src="js/shops.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>

    <script>
    $(document).ready(function() {
    $(".menu").click(function() {
        $(".toggle-list").toggleClass("active")
    })

    $("#close-nav").click(function() {
        $(".toggle-list").toggleClass("active")
    })

    $(".category-title").click(function() {
        console.log($(this).nextAll().slideToggle())
    })
    
    
})
</script>



</body>

</html>