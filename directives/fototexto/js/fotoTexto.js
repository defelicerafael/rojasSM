 angular.module("Fototexto",[])
    .directive("fototexto",function(){
        
        return{
            
            restrict: "E",
            templateUrl: 'directives/fotoTexto/templates/fotoTexto.html',
            scope: {
                bloque:"@",
                foto:"@",
                altvar:"@",
                titulo:"@",
                texto:"@",
                boton:"@",
                
                fotovar:"@",
                titulovar:"@",
                textovar:"@",
                botonlink:"@",
                botontexto:"@"
                
                
            },
            controller : function(){
              // console.log($scope.titulo);
              // console.log($scope.texto);
               
               
            }
        };
    });
        
    
   
  

