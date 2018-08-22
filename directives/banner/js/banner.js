 angular.module("Banner",[])
    .directive("banner",function(){
        
        return{
            
            restrict: "E",
            templateUrl: 'directives/banner/templates/banner.html',
            scope: {
                titulo:"@"
           
            },
            controller : function(){
             
               
            }
        };
    });
        
    
   
  

