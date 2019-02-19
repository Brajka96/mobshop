<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MobShop</title>
    <link rel="stylesheet" href="css/styles.css?newversion">
    <link rel="stylesheet" href="css/split.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">
    <script src="lib/angular.min.js"></script>



</head>

<body>
    <div id="home" class="header1">
        <nav class="navbar navbar-dark bg-dark">
            <div class="container">
                <div class="header1-info">
                    <i class="fas fa-phone"></i> +387 36 1111111
                    <i class="fas fa-envelope"></i> mobshop@test.com
                </div>
                <div class="header1-sign">
                    <a href="sign-in.php"><i class="fas fa-user"></i> Prijava</a>
                    <a href="sign-in.php" class="btn btn-info">Registracija</a>
                </div>
            </div>
        </nav>
    </div>
    <div class="toggle">
        <h1>Mob<span id="logo-span">Shop</span> </h1>
        <i class="fas fa-bars menu" aria-hidden="true"></i>
        <a href="sign-in.php"><i class="fas fa-shopping-cart"></i><span id="cart-badge"
                                class="badge badge-light">0</span></a>
    </div>
    <div class="toggle-list header2">
    
        <div class="wrapper">
            <nav id="navbar">
                
                <div class="logo">
                    <h1>Mob<span id="logo-span">Shop</span> </h1>
                </div>
                <ul id="nav-list">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="#services">O nama</a></li>
                    <li><a href="#contact">Kontakt</a></li>
                    <li><a href="sign-in.php">Prijava</a></li>
                    <li id="list-cart"><a href="sign-in.php"><i class="fas fa-shopping-cart"></i><span id="cart-badge"
                                class="badge badge-light">0</span></a></li>
                    <li>
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Guest <i class="fas fa-user"></i> </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="sign-in.php">Prijavi se</a>
                            </div>

                        </div>
                    </li>
                </ul>
                <div class="clear"></div>
            </nav>
        </div>
    </div>

    <main id="main">
        <div class="showcase">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="css/showcase-images/samsung_s9_thumb.png" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="css/showcase-images/iphoneX.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="css/showcase-images/zte-1.jpg" alt="Third slide">
                    </div>
                </div>
            </div>
        </div>
        <div class="main-products" ng-app="shopApp">
            <div class="container">
                <h3 class="titles"><span>IZDVOJENO</span></h3>
                <div class="row" ng-controller="shopController">
                    <div class="col-lg-4 col-sm-12 col-md-6" ng-repeat="product in products | limitTo: 6">
                        <div class="product-top text-center">
                            <img ng-src="css/phone-images/{{product.uredaj_slika}}" alt="product-1">
                            <div class="overlay">
                                <button type="button" rel="tooltip" data-placement="left" title="Pogledaj detalje"
                                    class="btn btn-info" ng-click="display(product)" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fa fa-eye"></i>
                                </button>

                                <button type="button" data-toggle="tooltip" data-placement="left" title="Prijavi se za pristup shopu!"
                                    class="btn btn-info">
                                    <a style="text-decoration: none; color:white" href="sign-in.php"><i class="fa fa-shopping-cart"></i></a>
                                </button>
                            </div>
                        </div>
                        <div class="product-bottom text-center">
                            <h4>{{product.uredaj_ime}}</h4>
                            <p>{{product.uredaj_cijena}} KM</p>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{active.uredaj_ime | uppercase}}</h5>
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
                                    <span class="d-inline-block" data-toggle="popover" data-content="Prijavite se kako biste imali pristup shop-u">
  <button class="btn btn-primary" style="pointer-events: none;" type="button" disabled>Dodaj u korpu</button>
</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section id="wrapper" class="skewed">
            <div class="layer bottom">
                <div class="content-wrap">
                    <div class="content-body">
                        <h1>Laptopi</h1>
                        <p>Najbolje marke laptopa na jednom mjestu. Brza dostava u cijeloj BiH. Pogledaj! Najbolje cijene uz sve opcije plaćanja. Naručite online! Plaćanje pouzećem. Sigurna kupovina. Plaćanje do 36 rata.</p>
                        <h3>Uskoro u ponudi!</h3>
                    </div>
                    <img src="css/img/laptopi.png" alt="">
                </div>
            </div>

            <div class="layer top">
                <div class="content-wrap">
                    <div class="content-body">
                        <h1>Mobiteli</h1>
                        <p>Ne propustite priliku kupiti atraktivni iPhone, Samsung, Huawei, Sony ili LG mobitel po novim, sniženim cijenama!</p>
                        <span class="d-inline-block" data-toggle="popover" data-content="Prijavite se kako biste imali pristup shop-u">
  <button class="btn btn-primary" style="pointer-events: none;" type="button" disabled>Pogledaj ponudu</button>
</span>
                    </div>
                    <img src="css/img/mobiteli.png" alt="">

                </div>
            </div>

            <div class="handle"></div>
        </section>
        <section class="container about-us" id="services">
            <h3 class="titles"><span>O nama</span></h3>
            <div id="about-us-section" class="row">
                <div class="col col-12 col-md-4">
                    <h2 class="indigo-text text-darken-4">Tko smo mi?</h2>
                    <p>Naše poduzeće je bazirano na online prodaju gdje posluje pod univerzalnim nazivom “MobShop” koji je postao popularan na tržištu BiH.</p>
                    <p>MobShop ima dugogodišnja iskustva i odlične reference kad je u pitanju poslovanje s tehnikom i mobilnim telefonima. <br>Tisuće zadovoljnih kupaca pokazatelj su uspješnosti poslovanja, a ključ našeg uspjeha su profesionalni , kreativni i poduzetni ljudi, spremni pružiti svoj doprinos i uložiti dodatan trud i vrijeme u postizanju odličnih rezultata.</p>
                </div>
                <div class="col col-md-6 col-12 offset-md-2">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab"
                                aria-controls="home" aria-selected="true">Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">Servis</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="future-tab" data-toggle="tab" href="#future" role="tab"
                                aria-controls="future" aria-selected="false">Vizija</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                            <p>MobShop online shop je nastao kao ideja dugogodišnjeg uspješnog poslovanja. MobShop ima dugu tradiciju i odlične reference kada je u pitanju poslovanje sa tehnikom i mobilnim telefonima. Na tržištu uspješno poslujemo, razvijamo se i kontinuirano inoviramo već 10 godina.</p>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <p>Za naše klijente nudimo sljedeće usluge: otključavanje, popravke svih vrsta hardverskih kvarova, otklanjanje softverskih kvarova, ugradnja rezervnih dijelova</p>
                        </div>
                        <div class="tab-pane fade" id="future" role="tabpanel" aria-labelledby="future-tab">
                            <p>Naša je misija pružiti svakom kupcu najbolju vrijednost za novac kroz vrhunsku uslugu i zadovoljstvo kupnje..</p>
                            <a href="#" class="btn btn-info">Više detalja</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="team-members">
            <div class="team-members-title">
                <h3 class="titles"><span>Naš Tim</span></h3>
            </div>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">

                        <div class="team-member">
                            <img src="css/img/member2.png" alt="">
                            <h5>Ante Bule</h5>
                            <p>Student informatike na FPMOZ-u, 3.godina studija. Backend developer</p>
                        </div>

                    </div>
                    <div class="carousel-item">

                        <div class="team-member">
                            <img src="css/img/member2.png" alt="">
                            <h5>Josip Pašalić</h5>
                            <p>Student informatike na FPMOZ-u, 3.godina studija. Frontend developer</p>
                        </div>

                    </div>
                    <div class="carousel-item">

                        <div class="team-member">
                            <img src="css/img/member2.png" alt="">
                            <h5>Petar Grubišić</h5>
                            <p>Student informatike na FPMOZ-u, 3.godina studija. Backend developer</p>
                        </div>
                    </div>
                    <div class="carousel-item">

                        <div class="team-member">
                            <img src="css/img/member2.png" alt="">
                            <h5>Josip Brajković</h5>
                            <p>Student informatike na FPMOZ-u, 3.godina studija. Frontend developer</p>
                        </div>

                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>
        <section id="contact">
            <div class="container">
                <h3 class="titles"><span>Kontakt</span></h3>
                <div class="row">
                    <div class="col-lg-6 col-sm-12 contact-info">
                        <div class="contact-content jumbotron ">
                        <h2>Naši kontakt podaci</h2>
                        <hr>
                        <br>
                        <h5><i class="fas fa-map-marker-alt"></i> Mostar, bulevar</h5>
                    <h5><i class="fas fa-map-marked-alt"></i> 88000, Mostar</h5>
                    <h5><i class="fas fa-phone"></i> +387 63 1111111</h5>
                    <h5><i class="fas fa-envelope"></i> mobshop@test.com</h5>
                        </div>
                        
                        
                    </div>
                    <div class="col-lg-5 col-sm-12 offset-lg-1" >
                        
                        <form id="contact-us">
                            <div class="form-group">
                                <label for="name">Ime</label>
                                <input type="text" class="form-control" id="name" placeholder="Upišite ime">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Upišite email">
                            </div>
                            <div class="form-group">
                                <label for="message">Poruka</label>
                                <textarea class="form-control" id="message" rows="3" placeholder="Vaša poruka"></textarea>
                            </div>
                            <button type="button" class="btn btn-primary btn-block">Pošalji</button>

                        </form>

                    </div>
                    
                </div>
                <div id="map"></div>
            </div>
            
        </section>
    </main>
    
    <?php include('view/footer.php') ?>

    <div class="scroll-to-top-btn">
        <a href="#"><i class="fas fa-arrow-circle-up fa-3x"></i></a>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>
    <script src="js/main.js?newversion"></script>
    <script src="js/split.js"></script>
    <script src="js/shop.js?newversion"></script>


    <script>
        var map;
        var mostar = { lat: 43.343033, lng: 17.807894 }
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: mostar,
                zoom: 16,
            });
            var marker = new google.maps.Marker({
                position: mostar,
                map: map,
                title: 'Hello World!'
            });
        }
    </script>

    <script>
    $(document).ready(function() {
    $(".menu").click(function() {
        console.log("TEST")
        $(".toggle-list").toggleClass("active")
    })
    })
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAngIcofEhGbdpHN3EDqIg8Hcb71nxnZbo&callback=initMap"
        type="text/javascript"></script>



</body>

</html>