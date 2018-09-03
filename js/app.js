(function(){
    var app = angular.module('Stock',['ngMaterial','SqlServices','config','angular.filter','paginas','ngCookies','Tabla','TablaLocal']);
    
    
    
    app.controller('Ctrl',['$timeout','$route','$routeParams','$q','SqlUnaColumna','$http','$scope','Sql','SqlInsertArray','SqlInsertZapatos','SqlEdit','SqlDelete','$mdToast','$mdDialog','SqlTablas','$cookies','$window',function($timeout,$route,$routeParams,$q,SqlUnaColumna,$http,$scope,Sql,SqlInsertArray,SqlInsertZapatos,SqlEdit,SqlDelete,$mdToast,$mdDialog,SqlTablas,$cookies,$window){
        var dtl = this;
        
        dtl.modelo = null;
        dtl.color = null;
        dtl.talle = null;
        dtl.local = null;
        dtl.proveedor = null;
        dtl.fechaCompra = new Date();;
        dtl.modelos = [];
        dtl.colores = [];
        dtl.talles = [];
        dtl.proveedores = [];
        dtl.zapatos = [];
        dtl.m = [];
        dtl.c = [];
        dtl.t = [];
        dtl.stock = [];
        dtl.contar = 0;
        dtl.locales = [];
        dtl.tablas = [];
        dtl.id_tabla = $routeParams.id_tabla;
        dtl.id_item = $routeParams.id_item;
        dtl.loginU = "false";
        dtl.user = [];
        dtl.filtro = "NO";
        dtl.localogin = "";
        dtl.semana = [];
        dtl.anio = [];
        dtl.mes = [];
        dtl.mesAnterior = "";
        dtl.semanaL = "";
        dtl.anioL = "";
        dtl.mesL = "";
        dtl.mesAnteriorL = [];
        dtl.semanaRL = [];
        dtl.anioRL = [];
        dtl.mesRL = [];
        dtl.mesAnteriorRL = "";
        dtl.semanaRLL = "";
        dtl.anioRLL = "";
        dtl.mesRLL = "";
        dtl.mesAnteriorRLL = [];
        dtl.semanaV = [];
        dtl.anioV = [];
        dtl.mesV = [];
        dtl.mesAnteriorV = [];
        dtl.semanaVL = "";
        dtl.anioVL = "";
        dtl.mesVL = "";
        dtl.mesAnteriorVL = "";
        
        dtl.zapatosRL = [];
        dtl.zapatosRLL = "";
        
        $scope.fechaCompra = new Date();
        $scope.fechaCompra.getTime();
        $scope.fechaCompra2 = $scope.fechaCompra.getFullYear()+"-"+($scope.fechaCompra.getMonth()+1)+"-"+$scope.fechaCompra.getDate();
        
        
        
        $scope.mesLetras = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $scope.meses = new Date();
        $scope.esteMes = $scope.mesLetras[$scope.meses.getMonth()];
        $scope.esteMesAnterior = $scope.mesLetras[$scope.meses.getMonth()-1];
        $scope.anio = $scope.meses.getFullYear();
        
        
        dtl.id_remito = $routeParams.id_remito;
        
        $scope.quecosa = 'SI';
        $scope.quecosaL = 'SI';
        
        dtl.item = {};
       // console.log($scope.fechaCompra.getTime());
        
        if(typeof $cookies.get('user') ==='undefined'){
            $window.location.href = '#/';
            dtl.log = "no";
            //console.log(dtl.log);
        }else{
            dtl.log = $cookies.get('user');
            dtl.localogin = $cookies.get('local');
            //console.log(dtl.log,dtl.localogin);
        }
     $scope.$watch(dtl.zapatos,function(newValue,oldValue) {
            if(newValue!==oldValue){
            dtl.sumar(dtl.zapatos,'precio_de_venta');
            
            dtl.zapatosL = newValue.length;
            dtl.showSimpleToast("ACTUALIZANDO...");
            }
        });
        
        $scope.$watch('quecosa',function(newValue,oldValue) {
           // console.log(newValue,oldValue,dtl.local);
            if(newValue!==oldValue){
                if(dtl.local===null){
                    
                 //   console.log(dtl.local,newValue);
                    dtl.Select({'pago':newValue},'zapato','id', 'ASC','9999');
                    dtl.selectBetween({'pago':newValue},'semana','id', 'ASC','9999');
                    dtl.selectBetween({'pago':newValue},'mes','id', 'ASC','9999');
                    dtl.selectBetween({'pago':newValue},'mesAnterior','id', 'ASC','9999');
                    dtl.selectBetween({'pago':newValue},'anio','id', 'ASC','9999');
                    dtl.Stock({'pago':newValue},'zapato','id', 'ASC', '9999');
                }else{
               //     console.log(dtl.local,newValue);
                    dtl.Select({'pago':newValue,'local':dtl.local},'zapato','id', 'ASC','9999');
                    dtl.selectBetween({'pago':newValue,'local':dtl.local},'semana','id', 'ASC','9999');
                    dtl.selectBetween({'pago':newValue,'local':dtl.local},'mes','id', 'ASC','9999');
                    dtl.selectBetween({'pago':newValue,'local':dtl.local},'mesAnterior','id', 'ASC','9999');
                    dtl.selectBetween({'pago':newValue,'local':dtl.local},'anio','id', 'ASC','9999');
                    dtl.Stock({'pago':newValue,'local':$scope.local},'zapato','id', 'ASC', '9999');   
                }
            }
        });
        
        $scope.$watch('quecosaL',function(newValue,oldValue) {
           // console.log(newValue,oldValue,dtl.local);
            if(newValue!==oldValue){
                    dtl.Select({'pago':newValue,'local':dtl.localogin},'zapato','id', 'ASC','9999');
                    dtl.selectBetween({'pago':newValue,'local':dtl.localogin},'semana','id', 'ASC','9999');
                    dtl.selectBetween({'pago':newValue,'local':dtl.localogin},'mes','id', 'ASC','9999');
                    dtl.selectBetween({'pago':newValue,'local':dtl.localogin},'mesAnterior','id', 'ASC','9999');
                    dtl.selectBetween({'pago':newValue,'local':dtl.localogin},'anio','id', 'ASC','9999');
                    dtl.Stock({'pago':newValue,'local':dtl.localogin},'zapato','id', 'ASC', '9999');
                }
            
        });
        
        
        
        $scope.$watch('dtl.local',function(newValue,oldValue) {
            if(newValue!==oldValue){
            console.log($scope.quecosa,newValue);    
            dtl.selectBetween({'pago':$scope.quecosa,'local':newValue},'semana','id', 'ASC','9999');
            dtl.selectBetween({'pago':$scope.quecosa,'local':newValue},'mes','id', 'ASC','9999');
            dtl.selectBetween({'pago':$scope.quecosa,'local':newValue},'mesAnterior','id', 'ASC','9999');
            dtl.selectBetween({'pago':$scope.quecosa,'local':newValue},'anio','id', 'ASC','9999');
            dtl.Stock({'pago':$scope.quecosa,'local':newValue},'zapato','id', 'ASC', '9999');
            }
        });  
            
        dtl.showSimpleToast = function(text) {
            $mdToast.show(
            $mdToast.simple()
            .textContent(text)
            .position('bottom right' )
            .hideDelay(1000)
            );
        };
       
        dtl.login = function(user, pass){
            $scope.isLoading=true;
           // console.log(user, pass);
            var filtro = {'nombre':user,'pass':pass};
            var link = 'server/columnasNew.php';
            var tabla = 'usuarios';
            var filtro_por = 'id';
            var orden = 'ASC';
            var limit = '1';
            Sql.async(filtro,link,tabla,filtro_por,orden,limit).then(function(d) {
                return $timeout(function() {
                        dtl.user = d;
                       // console.log(dtl.user);
                       return $timeout(function() {
                        if((dtl.user[0].nombre===user)&&(dtl.user[0].pass===pass)){
                            $cookies.put('user', dtl.user[0].nombre);
                            $cookies.put('local', dtl.user[0].admin);
                            //console.log($cookies.get('user'));
                            dtl.login = 'true';
                            dtl.log = $cookies.get('user');
                            dtl.localogin = $cookies.get('local');
                          // console.log(dtl.localogin);

                            if(dtl.localogin==='admin'){
                            $window.location.href = '#/stock/';
                            }else{
                            $window.location.href = '#/Milocal/stock/';    
                            }
                        }
                    $scope.isLoading=false;    
                }, 1000);
                    
                }, 650);
            });
            
            
        };
        
        dtl.loginQ = function(){
          if(typeof $cookies.get('user') ==='undefined'){
                $window.location.href = '#/';
                dtl.log = "no";
                dtl.localogin = "";
                // console.log(dtl.log);
                }else{
                dtl.log = $cookies.get('user');
                dtl.localogin = $cookies.get('local');
           // console.log(dtl.log);
            }
        };
        
        
       
       
       dtl.Tablas = function (){
            //console.log(datos,tabla,id,show);
            $scope.isLoading=true;
            var base = 'c1320252_rojas';
            var link = 'server/tablas.php';
            SqlTablas.async(link,base).then(function(d){
            //console.log(d);
            dtl.tablas = d;
                $scope.isLoading = false;
            });
        };
       
        
        dtl.Edit = function (datosi,tablai,idi,show){
            //console.log(datosi,tabla,id,show);
           // var datosIgresados = angular.fromJson(datosi);
           // console.log(datosIgresados[0]);
            $scope.isLoading=true;
            var where = 'id';
            var datos = datosi;
            var link = 'server/edit.php';
            var tabla = tablai;
            var id = idi;
            var show = show;
            SqlEdit.async(link,datos,tabla,id,where).then(function(d){
            console.log(d);
            
           // dtl.showSimpleToast("Ha editado con EXITO");
            $scope.isLoading = false;
            
                if(show===1){
                    window.history.back(1);
                }
                if(show==='5'){
                   console.log('Entre',datos,id);
                    $http({method: 'POST', url: 'server/email.php', data: {datos:datos,id:id}}).
                      then(function(response) {
                        $scope.status = response.status;
                        $scope.data = response.data;
                        console.log($scope.data);
                      }, function(response) {
                        $scope.data = response.data || 'Request failed';
                      console.log($scope.data);  
                      $scope.status = response.status;
                    });
                  
                    
                }
                if(show==='6'){
                   console.log('Entre',datos,id);
                    $http({method: 'POST', url: 'server/emailLocal.php', data: {id:id}}).
                      then(function(response) {
                        $scope.status = response.status;
                        $scope.data = response.data;
                        console.log($scope.data);
                      }, function(response) {
                        $scope.data = response.data || 'Request failed';
                      console.log($scope.data);  
                      $scope.status = response.status;
                    });
                  
                    
                }
            });
        };
        
        dtl.EditObj = function (datosi,tablai,idi,show){
            //console.log(datosi,tabla,id,show);
            var datosIgresados = angular.fromJson(datosi);
            console.log(datosIgresados[0]);
            $scope.isLoading=true;
            var where = 'id';
            var datos = datosIgresados[0];
            var link = 'server/edit.php';
            var tabla = tablai;
            var id = idi;
            var show = show;
            SqlEdit.async(link,datos,tabla,id,where).then(function(d){
                console.log(d);
           // dtl.showSimpleToast("Ha editado con EXITO");
            $scope.isLoading = false;
                if(show===1){
                    window.history.back(1);
                }
                });
            };
        
        
        dtl.vacio = function(algo){
          if(algo===""){
              ;
          }else{
              return algo;
          }  
        };
        
        
        dtl.solicitar = function(selected){
            $scope.pidiendo = true;
            $scope.showAlert = function(texto) {
            $mdDialog.show(
                  $mdDialog.alert()
                    .parent(angular.element(document.querySelector('#popupContainer')))
                    .clickOutsideToClose(true)
                    .title('Pedido:')
                    .textContent(texto)
                    .ariaLabel('Alert Dialog Demo')
                    .ok('Enterada!')
                    
                );
              };
            
         //console.log(selected,dtl.localogin);
           $http({method: 'POST', url: 'server/email_pedido.php', data: {local:dtl.localogin,zapato:selected}}).
                then(function(response) {
                  $scope.status = response.status;
                  $scope.data = response.data;
                  $scope.pidiendo = false;
                  console.log($scope.data);
                  $scope.showAlert($scope.data);
                  window.history.back(0);
                }, function(response) {
                $scope.data = response.data || 'Request failed';
              //console.log($scope.data);  
              $scope.status = response.status;
              $scope.pidiendo = false;
              $scope.showAlert($scope.status);
              window.history.back(0);
            });
        };    
            
            
        dtl.insert = function (datos,tabla){
           // console.log(datos,tabla);
            var datos = datos;
            var link = 'server/insert_array_datos.php';  
            var tabla = tabla;
            var cantidad = cantidad;
            SqlInsertArray.async(link,datos,tabla).then(function(d){
          //  console.log(d);
            dtl.showSimpleToast("Ha ingresado correctamente en la base de datos.");
            $scope.isLoading=true;
            $route.reload();
            
            });
        };
        
        
        dtl.resumenLocal = function(local,fecha){
            $scope.haciendoCuentas = true;
            var datos = local;
            var link = 'server/vendidoPago.php';  
            var tabla = fecha;
            SqlInsertArray.async(link,datos,tabla).then(function(d){
            console.log(d);
                
            if(tabla==='todo'){
                dtl.zapatosRL = d;
                dtl.zapatosRLL = dtl.zapatosRL.length; 
                console.log(dtl.zapatosRLL);
            }
             
            dtl.sumar(dtl.zapatos,'precio_de_venta');
            if(tabla==='semana'){
                    dtl.semanaRL = d;
                    if(dtl.semanaRL==='0'){
                        dtl.semanaRLL = 0;    
                        }else{
                     dtl.semanaRLL = dtl.semanaRL.length;  
                    }
              //  console.log("semana:"+dtl.semana);
                }
                if(tabla==='anio'){
                    dtl.anioRL = d;
                    if(dtl.anioRL==='0'){
                        dtl.anioRLL = '0';    
                        }else{
                     dtl.anioRLL = dtl.anioRL.length;  
                    }
              //   console.log("anio:"+dtl.anio);
                }
                 if(tabla==='mes'){
                    dtl.mesRL = d;
                    if(dtl.mesRL==='0'){
                        dtl.mesRLL = '0';    
                        }else{
                     dtl.mesRLL = dtl.mesRL.length;  
                    }
             //    console.log("mes:"+dtl.mes);
                }
                 if(tabla==='mesAnterior'){
                    dtl.mesAnteriorRL = d;
                    if(dtl.mesAnteriorRL==='0'){
                        dtl.mesAnteriorRLL = '0';    
                        }else{
                     dtl.mesAnteriorRLL = dtl.mesAnteriorRL.length;  
                    }
                   // console.log("mesAnterior: "+dtl.mesAnterior);
                }
            
            $scope.haciendoCuentas = false;
            });
        };
        
        
        dtl.insertTabla = function (datos,tabla){
            var datos = datos;
            var link = 'server/insert_array_datos_normal.php';  
            var tabla = tabla;
            var cantidad = cantidad;
            SqlInsertArray.async(link,datos,tabla).then(function(d){
            console.log(d);
            dtl.showSimpleToast("Ha ingresado correctamente en la base de datos.");
            $scope.isLoading=true;
            $route.reload();
            
            });
        };
        
        
         dtl.insertZ = function (datos,tabla,t35,t36,t37,t38,t39,t40,t41){
           
            var link = 'server/insert_array_datos_zapatos.php';       
            var datos = datos;
            var tabla = tabla;
            var t35 = t35;
            var t36 = t36;
            var t37 = t37;
            var t38 = t38;
            var t39 = t39;
            var t40 = t40;
            var t41 = t41;
            SqlInsertZapatos.async(link,datos,tabla,t35,t36,t37,t38,t39,t40,t41).then(function(d){
            //console.log(d);
            dtl.showSimpleToast("Ha ingresado correctamente en la base de datos.");
            $scope.isLoading=true;
            $route.reload();
            
            });
        };      
       
        dtl.Stock = function (filtro,tabla,filtro_por, orden, limit){
            //console.log(filtro,tabla,filtro_por, orden, limit);
            $scope.cargandoStock = true;
            var filtro = filtro;
            var link = 'server/stock_local.php';
            var tabla = tabla;
            var filtro_por = filtro_por;
            var orden = orden;
            var limit = limit;
            Sql.async(filtro,link,tabla,filtro_por,orden,limit).then(function(d) {
                dtl.stock = d;
                //console.log(dtl.stock);
                dtl.contar = 0;
                //console.log(dtl.stock);
                    angular.forEach(dtl.stock, function(value, key) {
                        //console.log(key + ': ' + value);
                        angular.forEach(value, function(value2, key2) {
                        //console.log(key2 + ': ' + value2);
                            angular.forEach(value2, function(value3, key3) {
                          //  console.log(value3,key3);
                            if(value3 > 0){
                                dtl.contar += value3;
                                //console.log(dtl.contar);
                                $scope.cargandoStock = false;
                            }
                            });
                        });
                    });
                
            });
        };
        dtl.buscar = function(modelo,color,talle,local){
            dtl.buscarStock =  {};
            dtl.buscarStock.pago = 'NO';
            if(modelo==="no"){
                dtl.Stock({'pago':'NO'},'zapato','id','asc',999);
            }else{
            
                if(typeof modelo !== "undefined"){
                    dtl.buscarStock.modelo = modelo;
                }
                if(typeof color !== "undefined"){
                    dtl.buscarStock.color = color;
                }
                 if(typeof talle !== "undefined"){
                    dtl.buscarStock.talle = talle;
                }
                 if(typeof local !== "undefined"){
                    dtl.buscarStock.local = local;
                }

               // console.log(dtl.buscarStock);
                dtl.Stock(dtl.buscarStock,'zapato','id','asc',999);
            }
        };
        dtl.Select = function (filtro,tabla,filtro_por, orden, limit){
            $scope.isLoading = true;
            var filtro = filtro;
            var link = 'server/columnasNew.php';
            var tabla = tabla;
            var filtro_por = filtro_por;
            var orden = orden;
            var limit = limit;
            if(tabla==='params'){
              tabla = dtl.id_tabla;
            }
            
            Sql.async(filtro,link,tabla,filtro_por,orden,limit).then(function(d) {
                //console.log(d);
                return $timeout(function() {
                    switch(tabla) {
                    case "modelos":
                        dtl.modelos = d;
                        dtl.m.push(d[0].nombre);
                        
                            //  console.log(dtl.m);
                        break;
                    case "colores":
                        dtl.colores = d;
                        dtl.c.push(d[0].nombre);
                      //  console.log(dtl.c);
                      //  console.log(dtl.colores);
                        break;
                    case "talles":
                        dtl.talles = d;
                        dtl.t.push(d[0].numero);
                      //  console.log(dtl.t);
                        break; 
                    case "proveedor":
                        dtl.proveedores = d;
                        dtl.p = d[0].nombre;
                       // console.log(dtl.proveedores);
                        break;
                    case "zapato":
                        dtl.zapatos = d;
                        dtl.zapatosL = dtl.zapatos.length;
                        dtl.sumar(dtl.zapatos,'precio_de_venta');
                       // console.log(dtl.zapatos);
                        break;
                     case "locales":
                        dtl.locales = d;
                        //console.log(dtl.locales);
                        break;
                    case "medios_de_pago":
                        dtl.medios_de_pago = d;
                     //   console.log(dtl.locales);
                        break;
                    case "pago":
                        dtl.pago = d;
                     //   console.log(dtl.locales);
                        break;
                    case "enviado":
                        dtl.enviado = d;
                     //   console.log(dtl.locales);
                        break;
                    case "canales":
                        dtl.canales = d;
                     //   console.log(dtl.locales);
                        break;
                    case "facturadora":
                        dtl.facturadora = d;
                     //   console.log(dtl.locales);
                        break;
                    case "usuarios":
                        dtl.user = d;
                        //console.log(dtl.user);
                        break;    
                    
                    default:
                        dtl.datos = d;
                      //  console.log(dtl.datos);
                    }
                    $scope.isLoading = false;
                }, 1000);
               
            
            });
        }; 
        
        dtl.sumar = function(array,columna){
            var contar = 0;
            angular.forEach(array, function(value, key) {
                angular.forEach(value, function(value2, key2) {
                    console.log(value2,key2);
                    if(key2===columna){
                        contar += parseInt(value2);
                    console.log(contar);
                    }
                });
            });
            return contar;
        };
        
        dtl.selectBetween =  function(filtro,tabla,filtro_por, orden, limit){
            // la tabla es la fecha semana, mes, anio
            var filtro = filtro;
            var link = 'server/resumen.php';
            var tabla = tabla;
            var filtro_por = filtro_por;
            var orden = orden;
            var limit = limit;
            Sql.async(filtro,link,tabla,filtro_por,orden,limit).then(function(d) {
            dtl.resumen = d;
           //console.log(dtl.resumen);
                if(tabla==='semana'){
                    dtl.semana = d;
                    if(dtl.semana==='0'){
                        dtl.semanaL = 0;    
                        }else{
                     dtl.semanaL = dtl.semana.length;  
                    }
              //  console.log("semana:"+dtl.semana);
                }
                if(tabla==='anio'){
                    dtl.anio = d;
                    if(dtl.anio==='0'){
                        dtl.anioL = '0';    
                        }else{
                     dtl.anioL = dtl.anio.length;  
                    }
              //   console.log("anio:"+dtl.anio);
                }
                 if(tabla==='mes'){
                    dtl.mes = d;
                    if(dtl.mes==='0'){
                        dtl.mesL = '0';    
                        }else{
                     dtl.mesL = dtl.mes.length;  
                    }
             //    console.log("mes:"+dtl.mes);
                }
                 if(tabla==='mesAnterior'){
                    dtl.mesAnterior = d;
                    if(dtl.mesAnterior==='0'){
                        dtl.mesAnteriorL = '0';    
                        }else{
                     dtl.mesAnteriorL = dtl.mesAnterior.length;  
                    }
                   // console.log("mesAnterior: "+dtl.mesAnterior);
                }
            });
            
        };
        
        
        dtl.selectBetweenVendido =  function(filtro,tabla,filtro_por, orden, limit){
            // la tabla es la fecha semana, mes, anio
            var filtro = filtro;
            var link = 'server/resumen.php';
            var tabla = tabla;
            var filtro_por = filtro_por;
            var orden = orden;
            var limit = limit;
            Sql.async(filtro,link,tabla,filtro_por,orden,limit).then(function(d) {
            dtl.resumen = d;
           //console.log(dtl.resumen);
                if(tabla==='semana'){
                    dtl.semanaV = d;
                    if(dtl.semanaV==='0'){
                        dtl.semanaVL = 0;    
                        }else{
                     dtl.semanaVL = dtl.semanaV.length;  
                    }
              //  console.log("semana:"+dtl.semana);
                }
                if(tabla==='anio'){
                    dtl.anioV = d;
                    if(dtl.anioV==='0'){
                        dtl.anioVL = '0';    
                        }else{
                     dtl.anioVL = dtl.anioV.length;  
                    }
              //   console.log("anio:"+dtl.anio);
                }
                 if(tabla==='mes'){
                    dtl.mesV = d;
                    if(dtl.mesV==='0'){
                        dtl.mesVL = '0';    
                        }else{
                     dtl.mesVL = dtl.mesV.length;  
                    }
             //    console.log("mes:"+dtl.mes);
                }
                 if(tabla==='mesAnterior'){
                    dtl.mesAnteriorV = d;
                    if(dtl.mesAnteriorV==='0'){
                        dtl.mesAnteriorVL = '0';    
                        }else{
                     dtl.mesAnteriorVL = dtl.mesAnteriorV.length;  
                    }
                   // console.log("mesAnterior: "+dtl.mesAnterior);
                }
            });
            
        };
        
        
        dtl.Excel = function (filtro,tabla,filtro_por, orden, limit){
            var filtro = filtro;
            var tabla = tabla;
            var filtro_por = filtro_por;
           // console.log('server/excel.php?filtro='+JSON.stringify(filtro)+'&tabla='+tabla+'&filtro_por='+filtro_por+'&limit=9999&orden=ASC');
            $window.location.href = 'server/excel.php?filtro='+JSON.stringify(filtro)+'&tabla='+tabla+'&filtro_por='+filtro_por+'&limit=9999&orden=ASC';
        }; 
        
        
        dtl.Hoy = function(){
            var d = new Date();
            var months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
            $scope.hoy =  months[d.getMonth()];
            //console.log($scope.hoy);
        };
        dtl.Hoy();
        
        dtl.SelectT = function (filtro,tabla,filtro_por, orden, limit){
            $scope.isLoadingSelectT=   false;
            var filtro = filtro;
            var link = 'server/columnasNew.php';
            var tabla = tabla;
            var filtro_por = filtro_por;
            var orden = orden;
            var limit = limit;
            if(tabla==='params'){
              tabla = dtl.id_tabla;
            }
            
            Sql.async(filtro,link,tabla,filtro_por,orden,limit).then(function(d) {
                return $timeout(function() {
                        dtl.datos = d;
                        $scope.isLoadingSelectT =  false;
                        //console.log(dtl.datos);
                    
                }, 650);
            });
        }; 
        
        
        
            
            
        $scope.Delete = function (id,tabla){
           // console.log(id,tabla);
            var r = confirm("Esta seguro que desea ELIMINAR este dato?");
            if(r===true){
            var link = 'server/delete.php';
            var id = id;
            SqlDelete.async(link,id,tabla).then(function(d){
            //console.log(d);
            dtl.showSimpleToast("Ha BORRADO un dato.");
            $scope.isLoading=true;
            $route.reload();
            });
            }
            
        };
        $scope.DeleteId = function (id,tabla){
           // console.log(id,tabla);
            var r = confirm("Esta seguro que desea ELIMINAR este dato?");
            if(r===true){
            var link = 'server/deleteId.php';
            var id = id;
            SqlDelete.async(link,id,tabla).then(function(d){
            //console.log(d);
            dtl.showSimpleToast("Ha BORRADO un dato.");
            $scope.isLoading=true;
            $route.reload();
            });
            }
            
        };
        
       // SELECT ALL //
        //$scope.items = [1,2,3,4,5];
        $scope.selected = [];
        
        $scope.toggle = function (item, list) {
          var idx = list.indexOf(item);
          if (idx > -1) {
            list.splice(idx, 1);
          }
          else {
            list.push(item);
          }
     //     console.log(item,list);
        };

        $scope.exists = function (item, list) {
          return list.indexOf(item) > -1;
      //    console.log(list.indexOf(item) > -1);
        };

        $scope.isIndeterminate = function() {
          return ($scope.selected.length !== 0 &&
              $scope.selected.length !== dtl.zapatos.length);
        };

        $scope.isChecked = function() {
          return $scope.selected.length === dtl.zapatos.length;
        };

        $scope.toggleAll = function() {
          if ($scope.selected.length === dtl.zapatos.length) {
            $scope.selected = [];
          //  console.log($scope.selected);
          } else if ($scope.selected.length === 0 || $scope.selected.length > 0) {
            $scope.selected = dtl.zapatos.slice(0);
          //  console.log($scope.selected);
          }
        };
      //FALTA ARMAR LA FUNCION
        dtl.asignar = function(array, tabla,local){
            var filtro = {nombre:local};
            var link = 'server/columnasNew.php';
            var tablita = 'locales';
            var filtro_por = 'id';
            var orden = "ASC";
            var limit = "1";
            Sql.async(filtro,link,tablita,filtro_por,orden,limit).then(function(d) {
            dtl.asigLocal = d;
            //console.log(d);    
                angular.forEach(array, function(value, key) {
                    
                var precio_final=value.precio_de_venta*dtl.asigLocal[0].comision/100;
                    dtl.Edit({'local':local,'descuentos':dtl.asigLocal[0].comision,'comision':precio_final},tabla,value.id,6);
                    dtl.Select({'local':local},'zapato','id', 'ASC', '999');
                });
            });
           
            
        };
        
        dtl.asignarRemito = function(array,tabla,talle,color,modelo){
            if(typeof talle !=='undefined'){
                angular.forEach(array, function(value, key) {
                    dtl.Edit({'talle':talle},tabla,value.id,0);
                });
            }
            if(typeof modelo !=='undefined'){
                angular.forEach(array, function(value, key) {
                    dtl.Edit({'modelo':modelo},tabla,value.id,0);
                    dtl.Select({'remito':dtl.id_remito},'zapato','id', 'ASC', '999');
                    
                });
            }
            if(typeof color !=='undefined'){
                angular.forEach(array, function(value, key) {
                    dtl.Edit({'color':color},tabla,value.id,0);
                    dtl.Select({'remito':dtl.id_remito},'zapato','id', 'ASC', '999');
                });
            };
            return $timeout(function() {
                dtl.Select({'remito':dtl.id_remito},'zapato','id', 'ASC', '999');
            },2000);
        };    
        
        
        //dtl.Select('no','locales','id', 'ASC', '999');
     // dtl.Select('no','zapato','id', 'ASC', '999');
     // dtl.Stock('no','zapato','id', 'ASC', '999');
        
     }]);
 
 
       
    
})();


