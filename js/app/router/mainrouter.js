/*MyApp.run(function($rootScope, $templateCache) {
   $rootScope.$on('$viewContentLoaded', function() {
      $templateCache.removeAll();
   });
});¨*/
MyApp.run(['$rootScope',function($rootScope,$window) {
  $rootScope.nombre="";
}]);
MyApp.config(function($routeProvider, $locationProvider) {
    $routeProvider
    .when('/', {
        templateUrl : 'view/inicio/inicio.php',
        controller : 'tuClaseDeBaileController'
    })
    .when('/ofrecemos', {
        templateUrl : 'view/ofrecemos/ofrecemos.php',
        controller : 'tuClaseDeBaileController'
    })
    .when('/caracteristicas/personalizar', {
        templateUrl : 'view/caracteristicas/personalizar.php',
        controller : 'tuClaseDeBaileController'
    })
    .when('/caracteristicas/visitantes', {
        templateUrl : 'view/caracteristicas/visitantes.php',
        controller : 'tuClaseDeBaileController'
    })
    .when('/caracteristicas/ventajas', {
        templateUrl : 'view/caracteristicas/ventajas.php',
        controller : 'tuClaseDeBaileController'
    })
    .when('/caracteristicas/asistencia', {
        templateUrl : 'view/caracteristicas/asistencias.php',
        controller : 'tuClaseDeBaileController'
    })
    .when('/caracteristicas/general', {
        templateUrl : 'view/caracteristicas/general.php',
        controller : 'tuClaseDeBaileController'
    })    
    .when('/tarifas', {
        templateUrl : 'view/tarifas/tarifas.php',
        controller : 'tuClaseDeBaileController'
    })
    .when('/embajadores', {
        templateUrl : 'view/embajadores/embajadores.php',
        controller : 'tuClaseDeBaileController'
    })
    .when('/nosotros', {
        templateUrl : 'view/nosotros/inicio.php',
        controller : 'tuClaseDeBaileController'
    })
    .when('/noticias', {
        templateUrl : 'view/noticias/noticias.php',
        controller : 'tuClaseDeBaileController'
    })
	.when('/empezar', {
        templateUrl : 'view/empezar/empezar.php',
        controller : 'tuClaseDeBaileController'
    })
	.when('/portularse', {
        templateUrl : 'view/postularse/postularse.php',
        controller : 'tuClaseDeBaileController'
    })
	.when('/empezar/activate', {
        templateUrl : 'view/empezar/activate.php',
        controller : 'tuClaseDeBaileController'
    })
	.when('/empezar/listo', {
        templateUrl : 'view/empezar/listo.php',
        controller : 'tuClaseDeBaileController'
    })
	.when('/empezar/encuesta', {
        templateUrl : 'view/empezar/encuesta.php',
        controller : 'tuClaseDeBaileController'
    })
    .when('/registro', {
        templateUrl : 'view/inicio/inicio.php',
        controller : 'tuClaseDeBaileController'
    })
    .when('/aliados', {
        templateUrl : 'view/aliados/aliados.php',
        controller : 'tuClaseDeBaileController'
    })
    .when('/aliados/listo', {
        templateUrl : 'view/aliados/listo.php',
        controller : 'tuClaseDeBaileController'
    })
    .when('/registro', {
        templateUrl : 'view/registro/empezar.php',
        controller : 'tuClaseDeBaileController'
    })
    .when('/registro/listo', {
        templateUrl : 'view/registro/listo.php',
        controller : 'tuClaseDeBaileController'
    })
    .otherwise({
        redirectTo: '/'
    });
    //$locationProvider.html5Mode(true);
});
