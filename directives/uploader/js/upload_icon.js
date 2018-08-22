 angular.module("upload_icon",['ngFileUpload'])
    .directive("uploadIcon",function(){
        
        return{
            restrict: "E",
            templateUrl: 'directives/uploader/templates/uploader_icon.html',
            scope: {
                titulo:"@",
                direccion :"@",
                dirImg:"@"
               
                
            },
            controller : function(Upload,$scope,$timeout,$http,$route,SqlInsertArray){
                $scope.insert = [];
                $scope.dir = $scope.direccion;
                $scope.setDir = function(dir){
                $scope.dir = dir;
                $scope.showDirectory(dir);
                };
                   
                    $scope.uploadFiles = function(files, errFiles,dir,dirImg) {
                   // console.log(dirImg);
                    $scope.foto = [];
                    $scope.files = files;
                    $scope.errFiles = errFiles;
                        angular.forEach(files, function(file) {

                                file.upload = Upload.upload({
                                    url: 'directives/uploader/server/server.php',
                                    data: {file: file,'dir':dir}
                                });

                            file.upload.then(function (response) {
                                $timeout(function () {
                                    file.result = response.data;
                                    $scope.foto = file.result;
                                    $scope.insert.logo = dirImg + $scope.foto;
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
                    $scope.showDirectory = function (dir){
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
            }   
        };
    });
        
    
   
  

