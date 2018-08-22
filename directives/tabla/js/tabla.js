 angular.module("Tabla",[])
    .directive("tabla",function(){
        
        return{
            
            restrict: "E",
            templateUrl: 'directives/tabla/templates/tabla.html',
            scope: {
                tabla:"@"
            },
            link:{
                post: function(scope,iElement,iAttributes,controller){
                    scope.$watch('tabla', function(tabla) {
                       // console.log(scope.tabla, tabla);
                        
                    });
                }
                        
            },
            controller : function($scope,$element,Sql,$timeout){
                $scope.traigoTabla = [];
                $scope.th = [];
                $scope.mostrar = [];
                $scope.myDate = new Date();
                $scope.myDate2 = new Date();
                $scope.modelo = null;
                $scope.color = null;
                $scope.talle = null;
                $scope.proveedor = null;
                $scope.fechaCompra = new Date();;
                $scope.modelos = [];
                $scope.colores = [];
                $scope.talles = [];
                $scope.proveedores = [];
                $scope.zapatos = [];
                $scope.m = [];
                $scope.c = [];
                $scope.t = [];
                $scope.stock = [];
                $scope.contar = 0;
                $scope.locales = [];
                $scope.tablas = [];
                $scope.filtered = [];
                //console.log($scope.filtered);
                
                
                $scope.unique = function(value, index, self){
                    return self.indexOf(value) === index;
                };
                $scope.sumar = function(array, item){
                    $scope.suma = 0;
                    angular.forEach(array, function(value, key) {
                        angular.forEach(value, function(value2, key2) {
                          //console.log(key2,item);
                            if(key2===item){
                                //console.log(value2);
                                $scope.suma += Number(value2);
                                //console.log($scope.suma);
                            }
                        
                        });
                    });
                    return $scope.suma;
                };
                
                $element.find('input').on('keydown', function(ev) {
                    ev.stopPropagation();
                });
                $scope.thFiltro = ['id','modelo','color','talle'];
                $scope.$watch('thFiltro', function(thFiltro) {
                    if(thFiltro){
                       $scope.texto = $scope.thFiltro.toString();
                        for(var i = 0 ; i < $scope.thFiltro.length; i++){
                           if($scope.texto.includes($scope.thFiltro[i])){
                               $scope.mostrar[$scope.thFiltro[i]] = true;
                              // console.log($scope.mostrar[$scope.thFiltro[i]]);
                           }
                        }
                    };
                });
                
                $scope.cantidad = $scope.thFiltro.lenght;
                
                $scope.mostrarArray = function(){
                    
                };
                
                $scope.$watch('tablajson', function(tablajson,valorViejo) {
                 // console.log(tablajson,valorViejo);
                    if(tablajson !== valorViejo) {
                        //$scope.traigoTabla = $scope.tabla;
                      //  console.log("cambio");
                        
                        $scope.tablajson = angular.fromJson($scope.tablajson);
                        $scope.filtered = $scope.tablajson;
                        angular.forEach($scope.tablajson, function(value, key) {
                                  angular.forEach(value, function(value2, key2) {
                                  $scope.th.push(key2);
                              });
                        });
                        $scope.thFiltrado = $scope.th.filter($scope.unique);
                        
                  }
                });
                $scope.selectBetween =  function(filtro,hasta, de,que){
                $scope.de = de.getFullYear()+"-"+(de.getMonth()+1)+"-"+de.getDate();
                $scope.hasta = hasta.getFullYear()+"-"+(hasta.getMonth()+1)+"-"+hasta.getDate();
             //   console.log($scope.de,$scope.hasta);
                var filtro = filtro;
                var link = 'server/entreFechas.php';
                var tabla = {'de':$scope.de,'hasta':$scope.hasta,'que':que};
                var filtro_por = 'id';
                var orden = 'ASC';
                var limit = '999';
                Sql.async(filtro,link,tabla,filtro_por,orden,limit).then(function(d) {
                $scope.tablajson = d;
                $scope.zapatosL = $scope.tablajson.length;
                //console.log($scope.tablajson);
                    });
                };
            $scope.Select = function (filtro,tabla,filtro_por, orden, limit){
            $scope.isLoading = true;
            //console.log(filtro);
            var filtro = filtro;
            var link = 'server/columnasNew.php';
            var tabla = tabla;
            var filtro_por = filtro_por;
            var orden = orden;
            var limit = limit;
                        
            Sql.async(filtro,link,tabla,filtro_por,orden,limit).then(function(d) {
                //console.log(d);
                return $timeout(function() {
                    switch(tabla) {
                    case "modelos":
                        $scope.modelos = d;
                        $scope.m.push(d[0].nombre);
                        
                            //  console.log(dtl.m);
                        break;
                    case "colores":
                        $scope.colores = d;
                        $scope.c.push(d[0].nombre);
                      //  console.log(dtl.c);
                      //  console.log(dtl.colores);
                        break;
                    case "talles":
                        $scope.talles = d;
                        $scope.t.push(d[0].numero);
                      //  console.log(dtl.t);
                        break; 
                    case "proveedor":
                        $scope.proveedores = d;
                        $scope.p = d[0].nombre;
                       // console.log(dtl.proveedores);
                        break;
                    case "zapato":
                        $scope.tablajson = d;
                        $scope.zapatosL = $scope.tablajson.length;
                        
                        $scope.sumar($scope.tablajson,'precio_de_venta');
                        console.log($scope.tablajson);
                        break;
                     case "locales":
                        $scope.locales = d;
                        //console.log(dtl.locales);
                        break;
                    case "medios_de_pago":
                        $scope.medios_de_pago = d;
                     //   console.log(dtl.locales);
                        break;
                    case "pago":
                        $scope.pago = d;
                     //   console.log(dtl.locales);
                        break;
                    case "enviado":
                        $scope.enviado = d;
                     //   console.log(dtl.locales);
                        break;
                    case "canales":
                        $scope.canales = d;
                     //   console.log(dtl.locales);
                        break;
                    case "facturadora":
                        $scope.facturadora = d;
                     //   console.log(dtl.locales);
                        break;
                    case "usuarios":
                        $scope.user = d;
                        //console.log(dtl.user);
                        break;    
                    
                    default:
                        $scope.datos = d;
                      //  console.log(dtl.datos);
                    }
                    $scope.isLoading = false;
                }, 1000);
               
            
            });
        }; 
            $scope.sumarTodo = function(){
                $scope.pv = $scope.sumar($scope.tablajson,'precio_de_venta');
                $scope.pf = $scope.sumar($scope.tablajson,'precio_final');
                $scope.pc = $scope.sumar($scope.tablajson,'precio_de_compra');
                $scope.co = $scope.sumar($scope.tablajson,'comision');
            }; 
            
            
            }
        };
    });
        
    
   
  

