MyApp.filter('nospace', function () {
    return function (value) {
        return (!value) ? '' : value.replace(/^\s+|\s+$/g, '');
    };
});
MyApp.directive('head', ['$rootScope','$compile',
			function($rootScope, $compile){
				return {
					restrict: 'E',
					link: function(scope, elem){
						var html = '<link rel="stylesheet" ng-repeat="(routeCtrl, cssUrl) in routeStyles" ng-href="{{cssUrl}}" >';
						elem.append($compile(html)(scope));

                        scope.routeStyles = {};

						$rootScope.$on('$routeChangeStart', function (e, next, current) {

							if(current && current.$$route && current.$$route.css){
								if(!Array.isArray(current.$$route.css)){
									current.$$route.css = [current.$$route.css];
								}
								angular.forEach(current.$$route.css, function(sheet){
									scope.routeStyles[sheet] = undefined;
								});
							}

							if(next && next.$$route && next.$$route.css){
								if(!Array.isArray(next.$$route.css)){
									next.$$route.css = [next.$$route.css];
								}
								angular.forEach(next.$$route.css, function(sheet){
									scope.routeStyles[sheet] = sheet;
								});
							}

						});

					}
				};
			}
		]);    

 
function loadjscssfile(filename, filetype) {
    if (filetype == "js") {
        // if filename is a external JavaScript file
        var fileref = document.createElement('script');
        fileref.setAttribute("type","text/javascript");
        fileref.setAttribute("src", filename);
    }
    else if (filetype == "css") {
        //if filename is an external CSS file
        var fileref = document.createElement("link");
        fileref.setAttribute("rel", "stylesheet");
        fileref.setAttribute("type", "text/css")
        fileref.setAttribute("href", filename)
    }
    if (typeof fileref != "undefined") {
        document.getElementsByTagName("head")[0].appendChild(fileref)
    }
}
   
MyApp.directive('script', function() {
    return {
      restrict: 'E',
      scope: false,
      link: function(scope, elem, attr) {
        if (attr.type=='text/javascript-lazy') {
          var code = elem.text();
          var f = new Function(code);
          f();
        }
      }
    };
});

