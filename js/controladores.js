 (function(){
    var app = angular.module('controladores-san-ignacio',[]);
    
  app.controller('CtrlBanner', function($scope, $interval,$http) {
        
        $http.get('http://www.sanignacio.edu.ar/server/server_fotos_banner.php').success(function(data){
        $scope.banner_fotos = data;
       // console.log(data);
        });
            
        $scope.current = 0;    
        //$scope.banner_list = ["imagenes/cabecera/1.jpeg","imagenes/cabecera/2.jpeg","imagenes/cabecera/3.jpeg","imagenes/cabecera/4.jpeg"];
        //$scope.foto_elegida = $scope.banner_fotos[current].img;
        
       $interval(function () {
        if ($scope.current<13){
            $scope.current++;
        }else{
            $scope.current = 0;
        }    
       // $scope.foto_elegida = $scope.banner_fotos[current];;
        }, 5100);
        
        
        
        
       });
       
        app.controller('Crtl_educacion_fisica', function($scope, $http) {
        $http.get('json/educacion_fisica.json').success(function(data){
        $scope.educacionFisica = data;
            });
        });
        
        app.controller('Crtl_ingles', function($scope, $http) {
        $http.get('json/ingles.json').success(function(data){
        $scope.ingles = data;
            });
        });
        app.controller('Crtl_proyectos', function($scope, $http) {
        $http.get('json/proyectos.json').success(function(data){
        $scope.proyectos = data;
            });
        });
       
        app.controller('Crtl_institucional', function($scope, $http) {
        
        $http.get('json/institucional.json').success(function(data){
        $scope.institucional = data;
       // console.log(data);
        });
        
       });
       
        app.controller('Crtl_inicial', function($scope, $http) {
        
        $http.get('json/inicial.json').success(function(data){
        $scope.inicial = data;
       // console.log(data);
            });
        });
        app.controller('Crtl_primaria', function($scope, $http) {
        
        $http.get('json/primaria.json').success(function(data){
        $scope.primaria = data;
       // console.log(data);
            });
        });
        app.controller('Crtl_secundaria', function($scope, $http) {
        
        $http.get('json/secundaria.json').success(function(data){
        $scope.secundaria = data;
       // console.log(data);
            });
        });
        
        
       app.controller('Crtl_noticias',['$scope','$http','$routeParams', function($scope, $http,$routeParams) {
       // console.log($routeParams.id);
        $scope.isLoading = true;
        $http.post('http://www.sanignacio.edu.ar/server/noticias/'+$routeParams.categoria+'/id.php',{id:$routeParams.id})
        .success(function(data){
        $scope.noticias = data;
        $scope.isLoading = false;
       // console.log(data);
        });
        //********************************************************//
        $http.post('http://www.sanignacio.edu.ar/server/noticias/'+$routeParams.categoria+'/id_texto.php',{id:$routeParams.id})
        .success(function(data){
        $scope.texto_noticias = data;
       // console.log(data);
        });
      //******************************************************//
        $scope.isLoading = true;
        $http.get('http://www.sanignacio.edu.ar/server/noticias/'+$routeParams.categoria+'.php')
        .success(function(data){
        $scope.todasNoticias = data;
        $scope.isLoading = false;
       // console.log(data);
        }); 
       }]);
   app.controller('Crtl_galeria',['$scope','$http','$routeParams','$mdDialog', function($scope, $http,$routeParams,$mdDialog) {
       // console.log($routeParams.id);
        $scope.isLoading = true;
        $scope.galeria = [];
        $http.post('http://www.sanignacio.edu.ar/server/galerias/id.php',{id:$routeParams.id})
        .success(function(data){
        $scope.galeria = data;
        $scope.isLoading = false;
        //console.log(data);
        });
         $http.post('http://www.sanignacio.edu.ar/server/galerias/id_fotos.php',{id:$routeParams.id})
        .success(function(data){
        $scope.galeria_fotos = data;
        $scope.isLoading = false;
        console.log(data);
        });
         $http.get('http://www.sanignacio.edu.ar/server/galerias/galerias.php')
        .success(function(data){
        $scope.galeria_historial = data;
        $scope.isLoading = false;
        console.log(data);
        });
        $scope.status = '  ';
        $scope.customFullscreen = true;
        $scope.foto = 0;
        $scope.showAdvanced = function(ev,index) {
            
            $mdDialog.show({
              controller: DialogController,
              templateUrl: 'templates/fotos.html',
              parent: angular.element(document.body),
              targetEvent: ev,
              clickOutsideToClose:true,
              fullscreen: $scope.customFullscreen // Only for -xs, -sm breakpoints.
              
            });
            
        function DialogController($scope, $mdDialog,$http) {
            $scope.hide = function() {
              $mdDialog.hide();
            };
            $scope.foto = index;
         
            $scope.cancel = function() {
              $mdDialog.cancel();
            };
             $http.post('http://www.sanignacio.edu.ar/server/galerias/id_fotos.php',{id:$routeParams.id})
            .success(function(data){
            $scope.galeria_fotos = data;
            $scope.isLoading = false;
            console.log(data);
            });
          
          }    
    
        };

        
        
       }]);
        app.controller('Crtl_contacto', function($scope, $http) {
        $scope.titulo = "CONTACTO";
        $scope.frase = "Dudas, consultas, comentarios, propuestas y demás. Todo es bienvenido, siempre y cuando sea con un fin constructivo. ";
       
        $scope.nombre = "";
        $scope.apellido = "";
        $scope.email = "";
        $scope.telefono = "";
        $scope.mensaje = "";
        $scope.submit = function() {
            console.log($scope.nombre + "," + $scope.apellido + "," + $scope.email + "," + $scope.telefono + "," + $scope.mensaje);
        $http.post('http://www.sanignacio.edu.ar/server/mail/mail.php',
            {nombre:$scope.nombre,
             apellido:$scope.apellido,
             email:$scope.email,
             telefono:$scope.telefono,
             mensaje:$scope.mensaje
            })
            .success(function(data){
            $scope.mailEnviado = data;
            $scope.isLoading = false;
            console.log(data);
            });
        };
        
            
        
        });
   
  })();

