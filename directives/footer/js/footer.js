 angular.module("Footer",[])
    .directive("footer",function(){
        
        return{
            
            restrict: "E",
            templateUrl: 'directives/footer/templates/footer.html',
            scope: {
                icono:"@"
                
            },
            controller : function(){
               
            }
        };
    });
        
    
   
  

