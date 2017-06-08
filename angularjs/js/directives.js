(function () {

	angular.module('app.directives', [])

    .directive('anuncio', function () {
      return {
        restrict: 'E',
        templateUrl: 'partials/anuncio.html'
      };
    });

})();