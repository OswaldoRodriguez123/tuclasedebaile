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
      $scope.ComoNosConocisteRequired='';
      $scope.RegionRequired='';

      $( "#nombre" ).removeClass( "error" );
      $( "#email" ).removeClass( "error" );
      $( "#email_confirmation" ).removeClass( "error" );
      $( "#celular" ).removeClass( "error" );
      $( "#como_nos_conociste_id" ).removeClass( "error" );
      $( "#region" ).removeClass( "error" );

      if(!$('#mostrar').text()){

        if (!$scope.formInfo.Nombre) {
          procesar=false;
          $scope.nombreRequired = 'Ups! El Nombre  es requerido';
          $( "#nombre" ).addClass( "error" );
        }
      }else{
          $scope.formInfo.Nombre=$('#mostrar').text();
      }


      if (!$scope.formInfo.Email) {
        procesar=false;
        $scope.emailRequired = 'Ups! El Correo  es requerido';
        $( "#email" ).addClass( "error" );
      }

      if (!$scope.formInfo.EmailConfirmation) {
        procesar=false;
        $scope.emailConfirmationRequired = 'Ups! El Correo  es requerido';
        $( "#email_confirmation" ).addClass( "error" );
      }else{
        if($scope.formInfo.Email != $scope.formInfo.EmailConfirmation){
          procesar=false;
          $scope.emailConfirmationRequired = 'Ups! Los correos no coinciden';
          $( "#email_confirmation" ).addClass( "error" );
        }
      }

      // if (!$scope.formInfo.Telefono) {
      //   procesar=false;
      //   $scope.telefonoRequired = 'Ups! El Telefono local es requerido';
      // }

      if (!$scope.formInfo.Sexo) {
        procesar=false;
        $scope.sexoRequired = 'Ups! El Sexo es requerido';
      }

      if (!$scope.formInfo.Celular) {
        procesar=false;
        $scope.celularRequired = 'Ups! El Telefono m??vil es requerido';
        $( "#celular" ).addClass( "error" );
      }

      if (!$scope.formInfo.ComoNosConociste) {
        procesar=false;
        $scope.ComoNosConocisteRequired = 'Ups! La pregunta de ??C??mo nos conociste? es requerida';
        $( "#como_nos_conociste_id" ).addClass( "error" );
      }

      if (!$scope.formInfo.Region) {
        procesar=false;
        $scope.RegionRequired = 'Ups! La Region es requerida';
        $( "#region" ).addClass( "error" );
      }

      //console.log(procesar);

      if(procesar==true){

        $scope.procesando=true;
        $scope.enviando=false;

         $scope.enviado=false;
         $scope.procesando=true;
         console.log($scope.formInfo);
         $.post("http://tuclasedebaile.com.co/script/interesado.php", { data : $scope.formInfo},
         // $.post("http://localhost/tuclasedebaile_v2016/script/interesado.php", { data : $scope.formInfo},
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
               $(location).attr('href','http://tuclasedebaile.com.co/#/empezar/listo');
               // $(location).attr('href','http://localhost/tuclasedebaile_v2016/#/empezar/listo');
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


    $scope.saveAliado = function() {

      $scope.enviando=true;
      $scope.vduplicado=false;

      //console.log($scope.formInfo);
      var procesar=true;

      $scope.nombreRequired = '';
      $scope.apellidoRequired = '';
      $scope.emailConfirmationRequired = '';
      $scope.emailRequired = '';
      $scope.paisRequired = '';

      $( "#nombre" ).removeClass( "error" );
      $( "#apellido" ).removeClass( "error" );
      $( "#email" ).removeClass( "error" );
      $( "#email_confirmation" ).removeClass( "error" );
      $( "#pais_id" ).removeClass( "error" );

      if (!$scope.formInfo.Nombre) {
        procesar=false;
        $scope.nombreRequired = 'Ups! El Nombre  es requerido';
        $( "#nombre" ).addClass( "error" );
      }

      if (!$scope.formInfo.Apellido) {
        procesar=false;
        $scope.apellidoRequired = 'Ups! El Apellido  es requerido';
        $( "#apellido" ).addClass( "error" );
      }
      

      if (!$scope.formInfo.Email) {
        procesar=false;
        $scope.emailRequired = 'Ups! El Correo  es requerido';
        $( "#email" ).addClass( "error" );
      }

      if (!$scope.formInfo.EmailConfirmation) {
        procesar=false;
        $scope.emailConfirmationRequired = 'Ups! El Correo  es requerido';
        $( "#email_confirmation" ).addClass( "error" );
      }else{
        if($scope.formInfo.Email != $scope.formInfo.EmailConfirmation){
          procesar=false;
          $scope.emailConfirmationRequired = 'Ups! Los correos no coinciden';
          $( "#email_confirmation" ).addClass( "error" );
        }
      }

      if (!$scope.formInfo.Pais) {
        procesar=false;
        $scope.paisRequired = 'Ups! El Pais es requerido';
        $( "#pais_id" ).addClass( "error" );
      }

      //console.log(procesar);

      if(procesar==true){

        $scope.procesando=true;
        $scope.enviando=false;

        $scope.enviado=false;
        $scope.procesando=true;
        // console.log($scope.formInfo);
        $.post("http://tuclasedebaile.com.co/script/aliado.php", { data : $scope.formInfo},
        // $.post("http://localhost/tuclasedebaile_v2016/script/aliado.php", { data : $scope.formInfo},
        function(response){
          console.log(response);
          var status=response.estado;  
          $scope.proceso=response.estado;             
          console.log($scope.proceso+" - "+status); 
          $timeout(function() {
            $scope.procesando=false;
            $scope.enviando=true;
            if($scope.proceso=="duplicado"){
               $scope.vcorrecto=false;
               $scope.vduplicado=true;
               $("html, body").animate({ scrollTop: 0 }, "slow");
            }else if($scope.proceso=="bien"){               
              $scope.vcorrecto=true;
              $scope.vduplicado=false;
              $(location).attr('href','http://tuclasedebaile.com.co/#/aliados/listo');
              // $(location).attr('href','http://localhost/tuclasedebaile_v2016/#/aliados/listo');
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


    $scope.saveRegistro = function() {

      $scope.enviando=true;
      $scope.vduplicado=false;

      //console.log($scope.formInfo);
      var procesar=true;

      $scope.emailConfirmationRequired = '';
      $scope.emailRequired = '';
      $scope.telefonoRequired = '';
      $scope.sexoRequired = '';
      $scope.celularRequired = '';
      $scope.codigoRequired='';
      $scope.RegionRequired='';

      $( "#nombre" ).removeClass( "error" );
      $( "#email" ).removeClass( "error" );
      $( "#email_confirmation" ).removeClass( "error" );
      $( "#celular" ).removeClass( "error" );
      $( "#codigo" ).removeClass( "error" );
      $( "#region" ).removeClass( "error" );

      if(!$('#mostrar').text()){

        if (!$scope.formInfo.Nombre) {
          procesar=false;
          $scope.nombreRequired = 'Ups! El Nombre  es requerido';
          $( "#nombre" ).addClass( "error" );
        }
      }else{
          $scope.formInfo.Nombre=$('#mostrar').text();
      }


      if (!$scope.formInfo.Email) {
        procesar=false;
        $scope.emailRequired = 'Ups! El Correo  es requerido';
        $( "#email" ).addClass( "error" );
      }

      if (!$scope.formInfo.EmailConfirmation) {
        procesar=false;
        $scope.emailConfirmationRequired = 'Ups! El Correo  es requerido';
        $( "#email_confirmation" ).addClass( "error" );
      }else{
        if($scope.formInfo.Email != $scope.formInfo.EmailConfirmation){
          procesar=false;
          $scope.emailConfirmationRequired = 'Ups! Los correos no coinciden';
          $( "#email_confirmation" ).addClass( "error" );
        }
      }

      // if (!$scope.formInfo.Telefono) {
      //   procesar=false;
      //   $scope.telefonoRequired = 'Ups! El Telefono local es requerido';
      // }

      if (!$scope.formInfo.Sexo) {
        procesar=false;
        $scope.sexoRequired = 'Ups! El Sexo es requerido';
      }

      if (!$scope.formInfo.Celular) {
        procesar=false;
        $scope.celularRequired = 'Ups! El Telefono m??vil es requerido';
        $( "#celular" ).addClass( "error" );
      }

      if (!$scope.formInfo.Codigo) {
        procesar=false;
        $scope.codigoRequired = 'Ups! El C??digo es requerido';
        $( "#codigo" ).addClass( "error" );
      }

      if (!$scope.formInfo.Region) {
        procesar=false;
        $scope.RegionRequired = 'Ups! La Region es requerida';
        $( "#region" ).addClass( "error" );
      }

      //console.log(procesar);

      if(procesar==true){

        $scope.procesando=true;
        $scope.enviando=false;

         $scope.enviado=false;
         $scope.procesando=true;
         console.log($scope.formInfo);
         $.post("http://tuclasedebaile.com.co/script/registro.php", { data : $scope.formInfo},
         // $.post("http://localhost/tuclasedebaile_v2016/script/interesado.php", { data : $scope.formInfo},
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
               $(location).attr('href','http://tuclasedebaile.com.co/#/registro/listo');
               // $(location).attr('href','http://localhost/tuclasedebaile_v2016/#/empezar/listo');
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

}); // tuClaseDeBaileController

MyApp.controller('confirmacionController', function($scope,$location,$http,$window,$routeParams,$timeout,$window) {
     $scope.correo_id = typeof($routeParams.correo) == "undefined" ? '0' : $routeParams.correo;
     try {
     $scope.correo_id = atob($scope.correo_id);
     } catch(e){
     $scope.correo_id = "";
     }
   console.log($scope.correo_id);
     if($scope.correo_id=='0'){
      $location.url('/no_confirmado');
     }else{
     console.log('entre');
        $.post("http://tuclasedebaile.com.co/script/interesado.php", { confirmar: 'confirmar', correo : $scope.correo_id},
             function(response){   
        console.log(response);
        if(response.mensaje=='confirmado'){
          $timeout(function() {
            $scope.confirmado=true;
            $scope.sinconfirmar=false;
           });
          window.setTimeout(function(){
            //$window.location.href="http://app.easydancelatino.com/";
          }, 5000)
        }else{
        $timeout(function() {
            $scope.confirmado=false;
          $scope.sinconfirmar=true;
           });
          

        }
       });
     }  
});
