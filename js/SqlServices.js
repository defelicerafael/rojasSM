(function(){
    var app = angular.module('SqlServices',[]);
    
    
   
    
    app.factory('Sql', function($http) {
        var myService = {
          async: function(filtro,link,tabla,filtro_por,orden,limit) {
            // $http returns a promise, which has a then function, which also returns a promise
            var filtro = filtro;
            var promise = $http.post(link,
                {
                 filtro:filtro,
                 tabla:tabla,
                 filtro_por:filtro_por,
                 orden:orden,
                 limit:limit
                }).then(function (response) {
                    //console.log(response);
                    return response.data;
            });
                return promise;
          }
        };
        return myService;
      });
      
      app.factory('SqlUnaColumna', function($http) {
        var myService = {
          async: function(columna,tabla,filtro,link) {
            // $http returns a promise, which has a then function, which also returns a promise
            var filtro = filtro;
            var promise = $http.post(link,
                {
                 filtro:filtro,
                 tabla:tabla,
                 columna:columna
                }).then(function (response) {
                    //console.log(response);
                    return response.data;
            });
                return promise;
          }
        };
        return myService;
      });
      app.factory('SqlUnaColumnaIguales', function($http) {
        var myService = {
          async: function(columna,tabla,filtro,dato,link) {
            // $http returns a promise, which has a then function, which also returns a promise
            var filtro = filtro;
            var promise = $http.post(link,
                {
                 filtro:filtro,
                 tabla:tabla,
                 columna:columna,
                 dato:dato
                }).then(function (response) {
                    //console.log(response);
                    return response.data;
            });
                return promise;
          }
        };
        return myService;
      });
     
    app.factory('SqlTablas', function($http) {
        var myService = {
            async: function(link,base) {
                var promise = $http.post(link,
                {
                 base:base
                }).then(function (response) {
                    //console.log(response.data);
                    return response.data;
            });
                return promise;
          }
        };
        return myService;
      });
      
    app.factory('SqlInsert', function($http) {
        var myService = {
            async: function(link,datos,tabla,id) {
                var promise = $http.post(link,
                {
                 datos:datos,
                 tabla:tabla,
                 id:id
                
                }).then(function (response) {
                    //console.log(response.data);
                    return response.data;
            });
                return promise;
          }
        };
        return myService;
      });
      
      app.factory('SqlEdit', function($http) {
        var myService = {
            async: function(link,datos,tabla,id,where) {
              //  console.log(link, datos, tabla, id, where);
                var promise = $http.post(link,
                {
                 datos:datos,
                 tabla:tabla,
                 id:id,
                 where:where
                }).then(function (response) {
              //      console.log(response.data);
                    return response.data;
            });
                return promise;
          }
        };
        return myService;
      });
      
    app.factory('SqlInsertGuardar', function($http) {
        var myService = {
            async: function(link,datos,tabla,email) {
                var promise = $http.post(link,
                {
                 datos:datos,
                 tabla:tabla,
                 mail:email
                
                }).then(function (response) {
                    console.log(response.data);
                    return response.data;
            });
                return promise;
          }
        };
        return myService;
      }); 
      
       app.factory('SqlDelete', function($http) {
        var myService = {
            async: function(link,id,tabla) {
                var promise = $http.post(link,
                {
                 id:id,
                 tabla:tabla
                }).then(function (response) {
                    console.log(response.data);
                    return response.data;
            });
                return promise;
          }
        };
        return myService;
      });
      
      app.factory('dosFiltros', function($http) {
        var myService = {
            async: function(link,filtro,filtro2,nombreJ) {
                var promise = $http.post(link,
                {
                 filtro:filtro,
                 filtro2:filtro2,
                 nombreJ:nombreJ
                }).then(function (response) {
                    console.log(response.data);
                    return response.data;
            });
                return promise;
          }
        };
        return myService;
      });
      
       app.factory('SqlInsertArray', function($http) {
        var myService = {
            async: function(link,datos,tabla) {
                var promise = $http.post(link,
                {
                 datos:datos,
                 tabla:tabla
                 
                }).then(function (response) {
                    //console.log(response.data);
                    return response.data;
            });
                return promise;
          }
        };
        return myService;
      });
      
      app.factory('SqlInsertZapatos', function($http) {
        var myService = {
            async: function(link,datos,tabla,t35,t36,t37,t38,t39,t40,t41) {
                var promise = $http.post(link,
                {
                 datos:datos,
                 tabla:tabla,
                 t35:t35,
                 t36:t36,
                 t37:t37,
                 t38:t38,
                 t39:t39,
                 t40:t40,
                 t41:t41
                 
                }).then(function (response) {
                    //console.log(response.data);
                    return response.data;
            });
                return promise;
          }
        };
        return myService;
      });
      
})();      
