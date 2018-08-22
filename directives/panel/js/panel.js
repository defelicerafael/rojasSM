 angular.module("panelItemTemplate",[])
    .directive("panelItem",function(){
        
        return{
            
            restrict: "E",
            templateUrl: 'directives/toolbar/templates/toolbar.html',
            scope: {
                titulo:"@",
                log:"@"
            },
            controller : function($scope,$mdSidenav,$mdDialog){
                var originatorEv;
                
                $scope.iconToolbar = "directives/toolbar/img/icon/ic_menu_white_24px.svg";
                $scope.iconUser = "directives/toolbar/img/icon/ic_person_black_24px.svg";
                $scope.iconCerrar = "directives/toolbar/img/icon/ic_close_white_24px.svg";
                
                $scope.openLeftMenu = function() {
                $mdSidenav('left').toggle();
                };
                $scope.ingresar = function(user,pass){
                    console.log(user,pass);
                    
                };
            }
        };
    });
        
    
   
  

