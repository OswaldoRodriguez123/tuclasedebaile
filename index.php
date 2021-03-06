<!DOCTYPE html>
<html lang="es" ng-app='MyApp' ng-controller="tuClaseDeBaileController" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
  <head itemscope itemtype="http://schema.org/WPHeader">
      <title>Tu Clase de Baile</title>
      <base href="/tuclasedebaile/" >
      <!-- <base href="http://tuclasedebaile.com.co/" > -->
      <link rel="canonical" href="http://tuclasedebaile.com.co/" />
      <meta name="twitter:card" content="summary" />
      <meta name="twitter:site" content="@tuclasedebaile" />
      <meta name="twitter:creator" content="@tuclasedebaile" />
      <meta name="google-site-verification" content="s2XTcpaA9Q1Y9eIa1LR60sDWEL0Al2A9LC2ML-6vO1s" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="msapplication-TileColor" content="#ffffff">
      <meta name="msapplication-TileImage" content="/img/favicon/ms-icon-144x144.png">
      <meta name="theme-color" content="#ffffff">
      <meta charset="utf-8" >
      <meta http-equiv="X-UA-Compatible" content="IE=edge">

      <meta name="description" content="Tu Clase de Baile, ¡APRENDE A BAILAR SALSA CASINO Y BACHATA DESDE CERO!" />
      <meta property="og:title" content="MÁS DE DIEZ AÑOS DE EXPERIENCIA NOS AVALAN | Tu Clase de Baile!" />
      <meta property="og:description" content="Tu Clase de Baile, ¡APRENDE A BAILAR SALSA CASINO Y BACHATA!" />
      <meta property="og:image" content="http://tuclasedebaile.com.co/img/logo.png" />
      <meta property="og:url" content="http://tuclasedebaile.com.co/" />
      <meta property="fb:app_id" content="783547831774120"/>

      <link rel="apple-touch-icon" sizes="57x57" href="/img/favicon/apple-icon-57x57.png">
      <link rel="apple-touch-icon" sizes="60x60" href="/img/favicon/apple-icon-60x60.png">
      <link rel="apple-touch-icon" sizes="72x72" href="/img/favicon/apple-icon-72x72.png">
      <link rel="apple-touch-icon" sizes="76x76" href="/img/favicon/apple-icon-76x76.png">
      <link rel="apple-touch-icon" sizes="114x114" href="/img/favicon/apple-icon-114x114.png">
      <link rel="apple-touch-icon" sizes="120x120" href="/img/favicon/apple-icon-120x120.png">
      <link rel="apple-touch-icon" sizes="144x144" href="/img/favicon/apple-icon-144x144.png">
      <link rel="apple-touch-icon" sizes="152x152" href="/img/favicon/apple-icon-152x152.png">
      <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-icon-180x180.png">
      <link rel="icon" type="image/png" sizes="192x192"  href="/img/favicon/android-icon-192x192.png">
      <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="96x96" href="/img/favicon/favicon-96x96.png">
      <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">
      <link rel="manifest" href="/img/favicon/manifest.json">
      
      <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
      <link rel="stylesheet" href="css/fontawesome/font-awesome.min.css">
      <link rel="stylesheet" href="css/angular-load/loading-bar.min.css">
      <link rel="stylesheet" href="css/bootstrap-sweetalert/sweet-alert.css">
      <link rel="stylesheet" href="css/tu_clase.css">
      <link rel="stylesheet" href="css/css_filter.css">
      <link rel="stylesheet" href="css/animate.min.css">
      <link rel="stylesheet" type="text/css" href="css/stimenu.css" /> 
      <!-- <link rel="stylesheet" href="css/main.min.css">    -->
      <link rel="stylesheet" href="css/main/main.css"> 
<!--  <link href="css/app.min.1.css" rel="stylesheet"> -->


      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <script src="js/vendor/jquery/jquery.min.js"></script>
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
      <script src="js/vendor/bootstrap-sweetalert/sweet-alert.js"></script>
      <script src="js/jquery-ui.min.js"></script>
      <script src="js/jquery.iconmenu.js"></script>
      <script src="js/function/default.js"></script>

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

      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-109491412-1"></script>
      <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-109491412-1');
      </script>

<!--       <script>
      (function(e,t,n,i,s,a,c){e[n]=e[n]||function(){(e[n].q=e[n].q||[]).push(arguments)}
      ;a=t.createElement(i);c=t.getElementsByTagName(i)[0];a.async=true;a.src=s
      ;c.parentNode.insertBefore(a,c)
      })(window,document,"galite","script","https://cdn.jsdelivr.net/npm/ga-lite@2/dist/ga-lite.min.js");

      galite('create', 'UA-109491412-1', 'auto');
      galite('send', 'pageview');
      </script> -->

  </head>
  <body itemscope itemtype="http://schema.org/WebPage">
    <nav class="navbar navbar-inverse navbar-blanco navbar-fixed-top" itemscope itemtype="http://schema.org/SiteNavigationElement">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-controls="navbar">
            <span class="sr-only">Menú</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand logo" href="#/"><img alt="Tu Clase de Baile" title="Tu Clase de Baile" src="img/logo.png" width="65" height="65"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="#/"><span>Tu Clase de Baile</span></a></li>
            <li><a href="#/ofrecemos" ng-class="getClass('/ofrecemos')"><span>Ofrecemos</span></a></li>
            <li><a href="https://tuclasedebaile.wordpress.com"><span>Blog</span></a></li>
            <li><a href="#/empezar" ng-class="getClass('/empezar')" ><span>Empezar</span></a></li>
            <li><a href="#/nosotros" ng-class="getClass('/nosotros')" > <span>Nosotros</span></a></li>
            <li><a href="#/lideres-en-accion" ng-class="getClass('/lideres-en-accion')" ><span>Líderes en Acción</span></a></li>
            <!-- <li><a href="#/aliados" ng-class="getClass('/aliados')" > <span style="color:#3E93CC; font-size:20px"> Aliados</span></a></li> -->
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <a href="#" class="scroll-top pi-active"><i class="tam-1-2 fa fa-chevron-up"></i></a>
    
    <div ng-view itemscope itemprop="mainContentOfPage"></div>

    <footer class="fondo-grey-darken-4 padding-top-bottom-50" itemscope itemtype="http://schema.org/WPFooter">
        <div class="container">
          <div class="row">
              <div class="col-md-12 padding-top-5 text-center">                  
                  <div class="padding-top-bottom-20">
                    <a href="https://www.facebook.com/Tuclasedebaileoficial/" target="_blank" ><img src="img/Facebook.png" class="img-circle img-center img-60" alt="Facebook"></a>
                    <!-- <a href="https://twitter.com/miclasedebaile1" target="_blank" ><img src="img/Twitter.png" class="img-circle img-center img-60"></a> -->
                    <a href="https://instagram.com/tuclasedebaileoficial/" target="_blank" ><img src="img/Instagram.png" class="img-circle img-center img-60" alt="Instagram"></a>
                    <a href="https://www.youtube.com/channel/UCJgz89J-sxJKBiANiC6qukQ/?sub_confirmation=1" target="_blank" ><img src="img/Youtube.png" class="img-circle img-center img-60"></a>
                  </div>
				          <p> 2017 <i class="glyphicon glyphicon-copyright-mark"></i> Tu Clase de Baile <p/>
              </div> 
            </div>
        </div> 
    </footer>    
  </body>
</html>