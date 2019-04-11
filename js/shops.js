var shopApp = angular.module("shopApp", []);

shopApp.controller("shopController", function($scope,$http) {

    $scope.sort = "id";
    $scope.searchProduct = "";
    $scope.active = {};
    $scope.cart = []; 
    $scope.products = [];
    $scope.allProducts = [];
    $totalPrice = "0";
    $scope.phonesLimit = 6;
    $scope.msgCss = {
        "position": "fixed",
        "top": "20px",
        "right":"10px",
        "z-index":"200000",
        "padding":"30px",
        "background":"green",
        "color":"white"}

    $http.get('model/fetch.php').then(function(response){
        $scope.data = response.data;
        console.log($scope.data);
        $scope.data.forEach(phone => {
            $scope.products.push(phone);
            $scope.allProducts.push(phone);
        });
    })

    $http.get('model/fetch-brands.php').then(function(response){
        $scope.brands = response.data;
    })

    $http.get('model/fetch-cart.php').then(function(response){
        $http.get('model/fetch-cart.php').then(function(response){
            
            if(Array.isArray(response.data)) {
                $scope.cart = response.data;
            } else {
                $scope.cart = [];
            }
        })
        
    })

    $http.get('model/fetch-ram.php').then(function(response){
        $scope.ram = response.data;
    })

    $http.get('model/fetch-storage.php').then(function(response){
        $scope.storage = response.data;
    })

    $scope.addToCart = function(phone) {
        var data = {
            'slika': phone.uredaj_slika,
            'ime': phone.uredaj_ime,
            'cijena': phone.uredaj_cijena,
        }
        if(confirm('Želite li dodati ' + phone.uredaj_ime + ' u korpu')){
            $http.post('model/dodaj_u_korpu.php', data).then(function(data){
                $scope.displayCart();
            })
            $('.buyMessage').css($scope.msgCss).show().html('Uspješno dodan uređaj'); // show and set the message
            setTimeout(function(){ $('.buyMessage').hide().html('');}, 3000);
        }
    }

    $scope.deleteDevice = function(product){
        if(confirm("Jeste li sigurni da zelite obrisati " + product.ime)){
            $http.post("model/delete-cart.php", {"id": product.id}).then(function(data){
                $scope.displayCart()
            }, function(err){
                console.log("ERROR!", err)
            })
        }else {
            return false;
        }
    }
    
    $scope.deleteAllDevices = function(){
        if(confirm("Jeste li sigurni da zelite obrisati sve uređaje")){
            $http.post("model/delete-cart-all.php").then(function(data){
                $scope.displayCart();
            }, function(err){
                console.log("ERROR!", err)
            })
        }else {
            return false;
        }
    }

    $scope.filterBrand = function(brand) {
        $scope.products = $scope.allProducts;
        $scope.products = $scope.products.filter(phone => phone.uredaj_brend == brand.uredaj_brend);
    }

    $scope.filterRam = function(ram) {
        $scope.products = $scope.allProducts;
        $scope.products = $scope.products.filter(phone => phone.uredaj_ram == ram.uredaj_ram);
    }

    $scope.filterStorage = function(storage) {
        $scope.products = $scope.allProducts;
        $scope.products = $scope.products.filter(phone => phone.uredaj_kapacitet == storage.uredaj_kapacitet);
    }

    $scope.display = function(product) {
        $scope.active = product;
    }

    $scope.displayCart = function() {
        $http.get('model/fetch-cart.php').then(function(response){
            if(Array.isArray(response.data)) {
                $scope.cart = response.data;
            } else {
                $scope.cart = [];
            }
        })
    }

    $scope.calculateDevice = function(device, id){
        var price = device.cijena;
        var qty = document.getElementsByClassName(`product-${id}-qty`)[0].value;
        var productTotal = document.getElementsByClassName(`product-${id}-total`)[0];
        var total = document.querySelectorAll(".product");
        var allPrices = []
        
        productTotal.innerHTML = price * qty + " KM";

        total.forEach(price => {
            allPrices.push(price.innerHTML.split(" ")[0]);
        });

        $scope.total = allPrices.reduce((total, price) => parseInt(total) + parseInt(price), 0);
    };
    
    $scope.seeMore = function() {
        $scope.phonesLimit = $scope.products.length;
    };
  
});

shopApp.directive('tooltip', function(){
    return {
        restrict: 'A',
        link: function(scope, element, attrs){
            $(element).hover(function(){
                // on mouseenter
                $(element).tooltip('show');
            }, function(){
                // on mouseleave
                $(element).tooltip('hide');
            });
        }
    };
});
   
