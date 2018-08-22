 angular.module("Iconos",[])
    .directive("iconos",function(){
        
        return{
            
            restrict: "E",
            templateUrl: 'directives/iconos/templates/iconos.html',
            scope: {
                icono:"@"
                
            },
            controller : function($scope){
               
             //  console.log($scope.icono);
               $scope.iconos = angular.fromJson($scope.icono);
               /*$scope.icono =   [
                                    {'img':'img/home/iconos/personas.png','alt':'personas','link':'/personas','texto':'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'},
                                    {'img':'img/home/iconos/empresas.png','alt':'empresas','link':'/empresas','texto':'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'},
                                    {'img':'img/home/iconos/educacion.png','alt':'educacion','link':'/educacion','texto':'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'},
                                    {'img':'img/home/iconos/organizaciones.png','alt':'organizaciones','link':'/organizaciones','texto':'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'}
                                    
                                ];
               */
                
               
            }
        };
    });
        
    
   
  

