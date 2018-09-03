(function(){
    var app = angular.module('config',['ngRoute']);
    
    app.config(function($routeProvider){
        $routeProvider
                .when("/",{
                    templateUrl:"templates/login.html",
                    controller:"Ctrl",
                    controllerAs : "dtl"
                })
                .when("/ingresar/zapatos",{
                    templateUrl:"templates/zapatos_list.html",
                    controller:"Ctrl",
                    controllerAs : "dtl"
                })
                .when("/editar/zapatos/:id_zapatos",{
                    templateUrl:"templates/articulos.html",
                    controller:"presupuestosCtrl",
                    controllerAs : "dtl"
                })
                .when("/stock/",{
                    templateUrl:"templates/stock.html",
                    controller:"Ctrl",
                    controllerAs : "dtl"
                })
               
                .when("/locales/",{
                    templateUrl:"templates/locales.html",
                    controller:"Ctrl",
                    controllerAs : "dtl"
                })
                .when("/remitos/",{
                    templateUrl:"templates/eliminar.html",
                    controller:"Ctrl",
                    controllerAs : "dtl"
                })
                .when("/remitos/editar/:id_remito",{
                    templateUrl:"templates/editar_remito.html",
                    controller:"Ctrl",
                    controllerAs : "dtl"
                })
                 .when("/tablas/",{
                    templateUrl:"templates/tablas.html",
                    controller:"Ctrl",
                    controllerAs : "dtl"
                })
                .when("/tablas/editar/:id_tabla",{
                    templateUrl:"templates/edit_tabla.html",
                    controller:"Ctrl",
                    controllerAs : "dtl"
                })
                .when("/tablas/editar/:id_tabla/id/:id_item",{
                    templateUrl:"templates/edit_item.html",
                    controller:"Ctrl",
                    controllerAs : "dtl"
                })
                .when("/ventas",{
                    templateUrl:"templates/venta.html",
                    controller:"Ctrl",
                    controllerAs : "dtl"
                })
                 .when("/resumen",{
                    templateUrl:"templates/resumen.html",
                    controller:"Ctrl",
                    controllerAs : "dtl"
                })
                .when("/Milocal",{
                    templateUrl:"templates/login.html",
                    controller:"Ctrl",
                    controllerAs : "dtl"
                })
                .when("/Milocal/ventas",{
                    templateUrl:"templates/venta_local.html",
                    controller:"Ctrl",
                    controllerAs : "dtl"
                })
                .when("/Milocal/stock/",{
                    templateUrl:"templates/stock_local.html",
                    controller:"Ctrl",
                    controllerAs : "dtl"
                })
                .when("/Milocal/resumen/",{
                    templateUrl:"templates/resumen_local.html",
                    controller:"Ctrl",
                    controllerAs : "dtl"
                })
                .when("/Milocal/pedidos/",{
                    templateUrl:"templates/pedidos_local.html",
                    controller:"Ctrl",
                    controllerAs : "dtl"
                })
               
                
                
                        .otherwise("/");
    });
    })();
