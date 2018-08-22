 (function(){
    var app = angular.module('upload',['ngFileUpload']);
  
  
  
  
     //este controlador sirve para subir fotos o files a una carpeta
  app.controller('uploadCtrl',['Upload','$scope','$timeout','$http','$route', function(Upload,$scope,$timeout,$http,$route,SqlInsertArray) {
      
        /// UPLOAD FILES CON ngFileUpload
        $scope.dir = '../../../images/body/';
        $scope.setDir = function(dir){
          $scope.dir = dir;
          $scope.showDirectory(dir);
        };
       // console.log($scope.dir);
        
        $scope.uploadFiles = function(files, errFiles,dir) {
        $scope.foto = [];
        $scope.files = files;
        $scope.errFiles = errFiles;
        angular.forEach(files, function(file) {
            if(dir==='gondola'){
                file.upload = Upload.upload({
                    url: 'directives/uploader/server/server.php',
                    data: {file: file,'dir':'../../../images/body/gondola/'}
                });
            }else{
                file.upload = Upload.upload({
                    url: 'directives/uploader/server/server.php',
                    data: {file: file,'dir':'../../../images/body/'}
                });
            }
            file.upload.then(function (response) {
                $timeout(function () {
                    file.result = response.data;
                 //   console.log(file.result);
                    //var foto = JSON.parse(file.result);
                    $scope.foto = file.result;
                    //console.log($scope.foto);
                    });
            }, function (response) {
                if (response.status > 0)
                    $scope.errorMsg = response.status + ': ' + response.data;
            }, function (evt) {
                file.progress = Math.min(100, parseInt(100.0 * 
                                         evt.loaded / evt.total));
              
                
            });
            
        });
        //store.DatosFotosGaleria();
    };
    
            $scope.Insert = function (datos,tabla){
                        //console.log("datos:" + datos + "tabla" + tabla);
                    var datosF = JSON.parse(JSON.stringify(datos));
                    var link = 'server/insert_array_datos.php';
                    var tabla = tabla;
                    SqlInsertArray.async(link,datosF,tabla).then(function(d){
                    console.log(d);
                    $scope.showSimpleToast(d);
                    $scope.isLoading=true;
                    $route.reload();
                    });
                };      
          
          
          
          
          $scope.showDirectory = function (dir)
        {
        $http.post('directives/uploader/server/directories.php',{dir:dir})
        .success(function(data){
        $scope.fotosDirectorio = data;
      //  console.log(data);
        
            });
        };
    $scope.deleteFoto = function (foto){
      //  console.log(foto);
        
        $http.post('directives/uploader/server/borrarFoto.php',{foto:foto})
        .success(function(data){
        $scope.borrarError = data;
      //  console.log(data);
        $route.reload(); 
        
            });
        };
    
        
       // FIN DEL UPLOAD ANDA JOYA !!
               
            
    }]);
  app.service('upload',["$http","$q",function($http, $q)
            {
               this.uploadFile = function(file,name,id)
               {
                   var deferred = $q.defer();
                   var formData = new FormData();
                   
                   formData.append("name",name);
                   formData.append("file",file);
                   formData.append("id",id);
                   
                   return $http.post("server/server.php",formData,{
                    headers:{
                        "content-type":undefined
                    },
                    transformRequest: angular.identity
                   })
                    .success(function(res)
                    {
                        deferred.resolve(res);
                    })
                    .error(function(msg){
                        deferred.reject(msg);
                   });
                   return deferred.promise;
               };
               
               this.uploadFileReduction = function(file,name,dir)
               {
                   var deferred = $q.defer();
                   var formData = new FormData();
                   
                   formData.append("name",name);
                   formData.append("file",file);
                   formData.append("dir",dir);
                  // formData.append("equipo",equipo);
                   
                   return $http.post("server/server_reducir.php",formData,{
                    headers:{
                        "content-type":undefined
                    },
                    transformRequest: angular.identity
                   })
                    .success(function(res)
                    {
                        deferred.resolve(res);
                    })
                    .error(function(msg){
                        deferred.reject(msg);
                   });
                   return deferred.promise;
               };
               
               this.uploadVideo = function(file,name,dir)
               {
             //      console.log(file,name,dir);
                   var deferred = $q.defer();
                   var formData = new FormData();
                   
                   formData.append("name",name);
                   formData.append("file",file);
                   formData.append("dir",dir);
                   
                   return $http.post("server/upload_file_archivos.php",formData,{
                    headers:{
                        "content-type":undefined
                    },
                    transformRequest: angular.identity
                   })
                    .success(function(res)
                    {
                        deferred.resolve(res);
                       // console.log(res);
                    })
                    .error(function(msg){
                        deferred.reject(msg);
                   });
                   return deferred.promise;
               }; 
               
            
            }]);      
         app.directive('ngConfirmClick', [
        function(){
            return {
                link: function (scope, element, attr) {
                    var msg = attr.ngConfirmClick || "Vas a eliminar una foto, �Estas segura?";
                    var clickAction = attr.confirmedClick;
                    element.bind('click',function (event) {
                        if ( window.confirm(msg) ) {
                            scope.$eval(clickAction);
                        }
                    });
                }
            };
    }]);
       
  })();

