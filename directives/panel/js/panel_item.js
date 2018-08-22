 angular.module("panelItemTemplate",[])
    .directive("panelItem",function(){
        
        return{
            restrict: "E",
            templateUrl: 'directives/panel/templates/panel_item.html',
            scope: {
                titulo:"@",
                tabla:"@",
                include:"@",
                filtro :"@",
                por :"@",
                orden :"@",
                limit : "@",
                check :  "@",
                edit :  "@",
                delete :  "@"
            },
            controller : function($scope,SqlInsertArray,$route,$mdToast,$element,Sql,$routeParams){
                $scope.isLoading = false;
                $scope.datos = [];
                $scope.categorias_list = [];
                
                
                
                
                $scope.showSimpleToast = function(text) {
                    $mdToast.show(
                    $mdToast.simple()
                    .textContent(text)
                    .position('bottom right' )
                    .hideDelay(3000)
                    );
                };
                
                $scope.Insert = function (datos,tabla){
                    
                    var datosF = JSON.parse(JSON.stringify(datos));
                    console.log("datos:" + datosF + "tabla" + tabla);
                    
                    var link = 'server/insert_array_home.php';
                    var tabla = tabla;
                    SqlInsertArray.async(link,datosF,tabla).then(function(d){
                    console.log(d);
                    $scope.showSimpleToast(d);
                    $scope.isLoading=true;
                    $route.reload();
                    });
                };
                $scope.Select = function (filtro,tabla,filtro_por,orden, limit,url){
                console.log(filtro,tabla,filtro_por,orden, limit,url);
                var filtro = filtro;
                var link = 'server/columnasNew.php';
                var tabla = tabla;
                var filtro_por = filtro_por;
                var orden = orden;
                var limit = limit;
                Sql.async(filtro,link,tabla,filtro_por,orden,limit).then(function(d) {
                console.log(d);
            
                switch (url) {
                    case 'locales':
                    $scope.categorias_list = d; 
                   // console.log($scope.categorias_list);
                    break;
                    case 'eventos':
                    $scope.data_eventos = d;
                  //  console.log($scope.data_eventos);
                    break;
                    
                    break;
                    default:
                    $scope.datos = d;
                }
                
                
        
            });
        };
        
        
                
               
                $scope.searchTerm;
                console.log($scope.searchTerm);
                $scope.clearSearchTerm = function() {
                $scope.searchTerm = '';
                };
      // The md-select directive eats keydown events for some quick select
      // logic. Since we have a search input here, we don't need that logic.
                $element.find('input').on('keydown', function(ev) {
                    ev.stopPropagation();
                });
            }
        };
    });
        
    
   
  

