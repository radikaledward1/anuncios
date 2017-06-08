angular.module("app", ["ngMaterial", "ngRoute", "ngFileUpload", "app.directives", "app.controllers", 'ngStorage'])
//inyectamos ThemingProvider configurar nuestro tema
.config( function($mdThemingProvider)
{
    $mdThemingProvider.theme('docs-dark', 'default')
    .primaryPalette('yellow')
    .dark();
})

.config(function($routeProvider, $locationProvider) {
   $routeProvider
    .when("/", {
        templateUrl: 'views/view-home.html',
        controller: 'ListaAnunciosController'
    })
    .when("/:id", {
        templateUrl: 'views/view-anuncio.html',
        controller: 'AnuncioController'
    })
    .when("/modules/profile", {
        templateUrl: 'views/view-profile.html',
        controller: 'ProfileController'
    })
    .when("/modules/login", {
        templateUrl: 'views/view-login.html'
    })
    .when("/modules/sign-up", {
        templateUrl: 'views/view-signup.html'
    })
    .otherwise({
        redirectTo: '/'
    });

    /*$locationProvider.html5Mode({
      enabled: true,
      requireBase: false
    });*/

    $locationProvider.html5Mode(true);
})

/*.config(function($httpProvider) {
    $httpProvider.defaults.useXDomain = true;
    delete $httpProvider.defaults.headers.common['X-Requested-With'];
})
 
.controller('appCtrl', function($scope, $mdBottomSheet)
{

});*/