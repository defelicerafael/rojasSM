(function(){
    var app = angular.module('paginas',[]);
    
    app.directive('header', function(){
        return{
            restrict: 'E',
            templateUrl:'templates/header.html',
            controller:function($scope,Sql,$window,$cookies){
                $scope.datosSecciones = [];
                $scope.DatosSecciones = function (){
                    //console.log("entre a DatosSecciones");
                    $scope.isLoadingHeader = true;
                    var filtro = 'no';
                    var link = 'server/columnasSecciones.php';
                    var tabla = 'secciones';
                    var filtro_por = 'id';
                    var orden = "ASC";
                    var limit = "100";
                    Sql.async(filtro,link,tabla,filtro_por,orden,limit).then(function(d) {
                    $scope.datosSecciones = d;
                    //console.log($scope.datosSecciones);
                    $scope.isLoadingHeader = false;
                    });
                }; 
                $scope.logout = function(){
                    $cookies.remove('user');
                    $cookies.remove('local');
                    $scope.log = "";
                    $window.location.href = '#/';
                };
                $scope.DatosSecciones();
                
            }
            
            };
        });
      app.directive('headerlocal', function(){
        return{
            restrict: 'E',
            templateUrl:'templates/headerLocal.html',
            controller:function($scope,Sql,$window,$cookies){
                $scope.datosSecciones = [];
                $scope.DatosSecciones = function (){
                    //console.log("entre a DatosSecciones");
                    $scope.isLoading = true;
                    var filtro = 'no';
                    var link = 'server/columnasSecciones.php';
                    var tabla = 'secciones';
                    var filtro_por = 'id';
                    var orden = "ASC";
                    var limit = "100";
                    Sql.async(filtro,link,tabla,filtro_por,orden,limit).then(function(d) {
                    $scope.datosSecciones = d;
                    //console.log($scope.datosSecciones);
                    $scope.isLoading = false;
                    });
                }; 
                $scope.logout = function(){
                    $cookies.remove('user');
                    $cookies.remove('local');
                    $scope.log = "";
                    $window.location.href = '#/';
                };
                $scope.DatosSecciones();
                
            }
            
            };
        });
          
    })();
