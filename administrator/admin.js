var adminApp = angular.module("adminApp", ['ngRoute']);

adminApp.config(["$routeProvider", function ($routeProvider) {
    $routeProvider
        .when("/", {
            templateUrl: "dashboard.php",
            controller: "adminController",
        })
        .when("/brendovi", {
            templateUrl: "brendovi.php",
            controller: "adminController",
        })
        .when("/korisnici", {
            templateUrl: "korisnici.php",
            controller: "adminController",
        })
        .when("/uredaji", {
            templateUrl: "uredaji.php",
            controller: "adminController",
        })
        .otherwise({
            redirectTo: "/"
        })
}])

adminApp.controller("adminController", function($scope,$http) {

    $scope.search = "";
    $msgStatus = false;
    $scope.msg = "";
    
    $scope.id = parseInt('ID');

    $scope.deleteUser = function(user){
        if(confirm("Jeste li sigurni da zelite obrisati " + user.IME)){
            $http.post("delete.php", {"id": user.ID}).then(function(data){
                $scope.displayUsers()
            })
        }else {
            return false;
        }
    }

    $scope.deleteDevice = function(product){
        if(confirm("Jeste li sigurni da zelite obrisati " + product.uredaj_ime)){
            
            $http.post("delete_device.php", {"id": product.uredaj_id}).then(function(data){
                $scope.displayDevices()
            })
        }else {
            return false;
        }
    }

    $scope.editDevice = function(device){
        $scope.editing = device;
        
    }

    $scope.editUser = function(user){
        $scope.editingUser = user
    }

    $http.get('fetch_users.php').then(function(response){
        $scope.users = response.data;
    })

    $http.get('../model/fetch.php').then(function(response){
        $scope.products = response.data;
    })

    $http.get('../model/fetch-brands.php').then(function(response){
        $scope.brands = response.data;
    })

    $scope.displayUsers = function() {
        $http.get('fetch_users.php').then(function(response){
            $scope.users = response.data;
            $scope.msg = 'Uspješno brisanje korisnika';
            $scope.msgType = 'danger';
        }, function(error){
            console.log("ERROR!!", error)
        })
    }

    $scope.displayDevices = function() {
        
        $http.get('../model/fetch.php').then(function(response){
            $scope.products = response.data;
            $scope.msg = 'Uspješno brisanje uređaja!';
            $scope.msgType = 'danger';
        })
    }

   

})

