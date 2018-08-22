 angular.module("Bloque",[])
    .directive("bloque",function(){
        
        return{
            
            restrict: "E",
            templateUrl: 'directives/bloque/templates/bloque.html',
            scope: {
                tituloarribafoto:"@",
                tituloabajofoto:"@",
                texto:"@",
                foto:"@",
                botonlink:"@",
                botontexto:"@",
                
                h3arriba:"@",
                h3abajo:"@",
                textoabajo:"@",
                image:"@",
                boton:"@"
                
            },
            controller : function(){
              // console.log($scope.titulo);
              // console.log($scope.texto);
               
               
            }
        };
    });
        
    
   
  

