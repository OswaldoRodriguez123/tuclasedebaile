MyApp.controller('tuClaseDeBaileController', function($scope,$location,$http,$window, $timeout) {
    $scope.titulo = 'Easy Dance';  
    $scope.visible= "block";
    
    $scope.getClass = function (path) {
    	if ($location.path().substr(0, path.length) === path) {
    	    return 'active';		
    	} else {
    	    return '';		
    	}
    }

    //$scope.formInfo = {};

    $scope.token="";
    var token;
    var status;
    $scope.proceso="";

    $scope.enviando=true;

    $scope.formInfo = {agregar:'agregarInteresado'};

    $scope.saveData = function() {

      $scope.enviando=true;
      $scope.vduplicado=false;

      //console.log($scope.formInfo);
      var procesar=true;

      $scope.emailConfirmationRequired = '';
      $scope.emailRequired = '';
      $scope.telefonoRequired = '';
      $scope.sexoRequired = '';
      $scope.celularRequired = '';
      $scope.formInfo.ComoNosConocisteRequired='';

      if(!$('#mostrar').text()){

        if (!$scope.formInfo.Nombre) {
          procesar=false;
          $scope.nombreRequired = 'Ups! El Nombre  es requerido';
        }
      }else{
          $scope.formInfo.Nombre=$('#mostrar').text();
      }


      if (!$scope.formInfo.Email) {
        procesar=false;
        $scope.emailRequired = 'Ups! El Correo  es requerido';
      }

      if (!$scope.formInfo.EmailConfirmation) {
        procesar=false;
        $scope.emailConfirmationRequired = 'Ups! El Correo  es requerido';
      }

      if (!$scope.formInfo.Telefono) {
        procesar=false;
        $scope.telefonoRequired = 'Ups! El Telefono local es requerido';
      }

      if (!$scope.formInfo.Sexo) {
        procesar=false;
        $scope.sexoRequired = 'Ups! El Sexo es requerido';
      }

      if (!$scope.formInfo.Celular) {
        procesar=false;
        $scope.celularRequired = 'Ups! El Telefono móvil es requerido';
      }

      if (!$scope.formInfo.ComoNosConociste) {
        procesar=false;
        $scope.ComoNosConocisteRequired = 'Ups! La pregunta de ¿Cómo nos conociste? es requerida';
      }

      //console.log(procesar);

      if(procesar==true){

        $scope.procesando=true;
        $scope.enviando=false;

         $scope.enviado=false;
         $scope.procesando=true;
         console.log($scope.formInfo);
         $.post("http://localhost/tuclasedebaile_v2016/script/interesado.php", { data : $scope.formInfo},
             function(response){
             //console.log(response);
             var status=response.estado;  
             $scope.proceso=response.estado;             
             console.log($scope.proceso+" - "+status); 
         $timeout(function() {
            $scope.procesando=false;
            $scope.enviando=true;
            if($scope.proceso=="duplicado"){
               $scope.vcorrecto=false;
               $scope.vduplicado=true;
               //$window.scrollTo(0, 0);
               $("html, body").animate({ scrollTop: 0 }, "slow");
            }else if($scope.proceso=="bien"){               
               $scope.vcorrecto=true;
               $scope.vduplicado=false;
               //window.location="empezar/listo";
               $(location).attr('href','http://localhost/tuclasedebaile_v2016/#/empezar/listo');
               //$("html, body").animate({ scrollTop: 0 }, "slow");
            }else{               
               $scope.vcorrecto=false;
               $scope.vincorrecto=true;
               $scope.vduplicado=false;
               $("html, body").animate({ scrollTop: 0 }, "slow");
            }
         },3000);

        });
      }

    };

    
    $scope.dynamicPopover = {
    content: 'Hello, World!',
    templateUrl: 'myPopoverTemplate.html',
    title: 'Title'
  };
});
