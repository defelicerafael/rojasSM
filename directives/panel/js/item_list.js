 angular.module("panelItemListTemplate",[])
    .directive("itemList",function(){
        
        return{
            restrict: "E",
            templateUrl: 'directives/panel/templates/item_list.html',
            scope: {
                titulo:"@",
                filtro:"@",
                tabla:"@",
                por:"@",
                orden:"@",
                limit:"@",
                check:"@",
                edit :  "@",
                delete :  "@"
                
            },
            controller : function($scope,Sql,SqlEdit,$mdToast,$route,SqlDelete){
                $scope.isLoading = true;
                $scope.todos = [];
                $scope.showSimpleToast = function(text) {
                    $mdToast.show(
                    $mdToast.simple()
                    .textContent(text)
                    .position('bottom right' )
                    .hideDelay(3000)
                    );
                };
                
                $scope.Select = function (filtro,tabla,filtro_por,orden,limit){
                        $scope.isLoading=true;
                        //console.log(filtro,tabla,filtro_por,orden,limit);
                        var filtro = filtro;
                        var link = 'server/columnasNew.php';
                        var tabla = tabla;
                        var filtro_por = filtro_por;
                        var orden = orden;
                        var limit = limit;
                        Sql.async(filtro,link,tabla,filtro_por,orden,limit).then(function(d) {
                        $scope.todos = d;
                        console.log(d);
                        $scope.isLoading = false;
                        });
                    };
                    $scope.Edit = function (datos,tabla,id){
                        $scope.isLoading=false;
                        var where = 'id';
                        var datos = datos;
                        var link = 'server/edit.php';
                        var tabla = tabla;
                        var id = id;
                        SqlEdit.async(link,datos,tabla,id,where).then(function(d){
                        $scope.showSimpleToast("Ha editado con EXITO");
                        $scope.isLoading=false;
                        });
                    };
                    $scope.Delete = function (id,tabla){
                        $scope.isLoading=false;
                        var r = confirm("Esta seguro que desea ELIMINAR este dato?");
                        if(r===true){
                            var link = 'server/delete.php';
                            var id = id;
                            SqlDelete.async(link,id,tabla).then(function(d){
                            //    console.log(d);
                            $scope.showSimpleToast("Ha BORRADO un dato.");
                            $scope.isLoading=false;
                            $route.reload();
                            });
                        }  
                     };
                    
            }
        };
    });
        
    
   
  

