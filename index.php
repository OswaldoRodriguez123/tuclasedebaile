<!DOCTYPE html>
<html lang="es" ng-app='MyApp' ng-controller="tuClaseDeBaileController" >
  <head>
      <title>Tu Clase de Baile!</title>
      <meta charset="utf-8" >
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta property="og:title" content="MÁS DE DIEZ AÑOS DE EXPERIENCIA NOS AVALAN | Tu Clase de Baile!" />
      <meta property="og:description" content="Tu Clase de Baile, ¡APRENDE A BAILAR SALSA CASINO Y BACHATA!" />
      <meta name="description" content="Tu Clase de Baile, ¡APRENDE A BAILAR SALSA CASINO Y BACHATA!" />
      <meta property="og:image" content="" />
      <link rel="shortcut icon" type="image/x-icon" href=""/>
      <base href="/tuclasedebaile_v2016/" >
      <!-- <base href="http://tuclasedebaile.com.co/" > -->
      <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">
      <link href="css/fontawesome/font-awesome.min.css" rel="stylesheet">
      <link href="css/angular-load/loading-bar.min.css" rel="stylesheet">
      <link href="css/main/main.css" rel="stylesheet">    
      <link rel="stylesheet" href="css/bootstrap-sweetalert/sweet-alert.css">
      <link href="css/tu_clase.css" rel="stylesheet">
      <link href="css/css_filter.css" rel="stylesheet">
  <!--     <link href="css/app.min.1.css" rel="stylesheet"> -->
      <link href="css/animate.min.css" rel="stylesheet">
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <script src="js/vendor/jquery/jquery-1.11.3.min.js"></script>
      <script src="js/vendor/angular/angular.min.js"></script>
      <script src="js/vendor/angular_lib/angular-animate.min.js"></script> 
      <script src="js/vendor/angular_lib/angular-touch.min.js"></script>
      <script src="js/vendor/angular_lib/angular-route.min.js"></script> 
      <script src="js/vendor/angular_load/loading-bar.min.js"></script> 
      <script src="js/vendor/angular_validate/jquery.validate.min.js"></script>
      <script src="js/vendor/angular_validate/angular-validate.min.js"></script>
      <script src="js/vendor/mask/mask.js"></script>
      <script src="js/app/main.js"></script>    
      <script src="js/app/controller/maincontroller.js"></script>
      <script src="js/vendor/angular_ui_bootstrap/ui-bootstrap-tpls-0.13.4.min.js"></script>
      <script src="js/app/router/mainrouter.js"></script>     
      <script src="js/app/directive/maindirective.js"></script>    
      <script src="js/function/function.js"></script>
      <script src="js/input-mask/input-mask.min.js"></script>
      <script src="js/vendor/bootstrap/bootstrap.min.js"></script>    
      <script src="js/function/default.js"></script>
      <script src="js/vendor/bootstrap-sweetalert/sweet-alert.js"></script>

      <!-- Facebook Pixel Code -->
      <script>
      !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
      n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
      document,'script','https://connect.facebook.net/en_US/fbevents.js');

      fbq('init', '783547831774120');
      fbq('track', "PageView");
      fbq('track', 'Lead');</script>
      <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=783547831774120&ev=PageView&noscript=1"
      /></noscript>
      <!-- End Facebook Pixel Code -->
      
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-blanco navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Menú</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand logo" href="#/"><img alt="Tu Clase de Baile" title="Tu Clase de Baile" src="img/logo.png" width="65" height="65"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li style="padding-left: 50px"><a href="#/"> <span style="color:#3E93CC; font-size:20px;"> Tu Clase de Baile</span></a></li>
            <li><a href="#/ofrecemos" ng-class="getClass('/ofrecemos')"> <span style="color:#3E93CC; font-size:20px"> Ofrecemos</span></a></li>

            <li><a href="https://tuclasedebaile.wordpress.com/"> <span style="color:#3E93CC; font-size:20px"> Blog</span></a></li>

            <li><a href="#/empezar" ng-class="getClass('/empezar')" > <span style="color:#3E93CC; font-size:20px"> Empezar</span></a></li>
            <li><a href="#/nosotros" ng-class="getClass('/nosotros')" > <span style="color:#3E93CC; font-size:20px"> Nosotros</span></a></li>
            <!-- <li><a href="#/aliados" ng-class="getClass('/aliados')" > <span style="color:#3E93CC; font-size:20px"> Aliados</span></a></li> -->
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <a href="#" class="scroll-top pi-active"><i class="tam-1-2 fa fa-chevron-up"></i></a>
    <!--<div class="container">
    <div class="row">                
        <div class="col-lg-12">-->
    <div ng-view></div>
        <!--</div>                
    </div>
    </div>-->
    <footer class="fondo-grey-darken-4 padding-top-bottom-50">
        <div class="container">
          <div class="row">
              <div class="col-md-12 padding-top-5 text-center">                  
                  <div class="padding-top-bottom-20">
                    <a href="https://www.facebook.com/Mi-Clase-de-Baile-960537544002431/" target="_blank" ><img src="img/Facebook.png" class="img-circle img-center img-60"></a>
                    <!-- <a href="https://twitter.com/miclasedebaile1" target="_blank" ><img src="img/Twitter.png" class="img-circle img-center img-60"></a> -->
                    <a href="https://instagram.com/tuclasedebaileoficial/" target="_blank" ><img src="img/Instagram.png" class="img-circle img-center img-60"></a>
                    <!-- <a href="https://www.youtube.com/channel/UC91HkwzEv66vHVMZ0xX2wQw" target="_blank" ><img src="img/Youtube.png" class="img-circle img-center img-60"></a> -->
                  </div>
				          <p> 2017 <i class="glyphicon glyphicon-copyright-mark"></i> Tu Clase de Baile <p/>
              </div> 
            </div>
        </div> 
    </footer>    
  </body>
</html>