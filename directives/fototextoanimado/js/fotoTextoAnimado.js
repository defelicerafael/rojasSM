 angular.module("FototextoAnimado",[])
    .directive("fototextoanimado",function(){
        
        return{
            
            restrict: "E",
            templateUrl: 'directives/fotoTextoAnimado/templates/fotoTextoAnimado.html',
            scope: {
                foto:"@",
                textoantes:"@",
                textodespues:"@",
                link:"@"
            },
            controller : function(){
              // console.log($scope.titulo);
              // console.log($scope.texto);
               
               
            }
        };
    });
        
    
   
  

