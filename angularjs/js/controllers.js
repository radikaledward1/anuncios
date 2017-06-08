(function () {

	angular.module('app.controllers', [])

	.controller('ListaAnunciosController', ['$scope', '$http' ,'$mdDialog', function ($scope, $http, $mdDialog) {

		$http.get('http://pruebas.evolucionmarketing.com/anuncios/api/anuncios')
		.then(function success (response) {

			$scope.anuncios = response.data;

		}, function error () {

			//Aqui se maneja el error
		});

		$scope.crearanuncio = function(env) {

			$mdDialog.show({

				controller: 'NuevoAnuncioController as ctrlNuevoAnuncio',
				templateUrl: 'partials/nuevo-anuncio.html',
				targetEvent: env,
				clickOutsideToClose: false

			}).then(function (response) { //Al ejecutar $mdDialog.hide().

				$scope.anuncios.push(response);

			}, function () { //Al ejecutar $mdDialog.cancel().

			});
		};

	}])

	.controller('NuevoAnuncioController', ['$scope', '$http', '$mdDialog', 'Upload', function ($scope, $http, $mdDialog, Upload) {

		var user = "9";
		$scope.onuse = false;

		$scope.loadcategories = function() {

			$http.get('http://pruebas.evolucionmarketing.com/anuncios/api/get/categorias')
			.then(function success (response) {

				$scope.categorias = response.data;

			}, function error () {

				//Aqui se maneja el error

			});
		}

		$scope.save = function() {

			/*Hace Binding de los elementos en la forma directamente usando el atributo 'ng-model',
			no fue necesario hacer uso del submit del boton y crear algo como $scope.anuncio = {}, que resiva los parametros del submit a la forma*/

			//Deshabilita el boton de 'Crear'.
			$scope.onuse = true;

			Upload.upload({

				url: 'http://pruebas.evolucionmarketing.com/anuncios/api/add/anuncio',
				data: {'titulo': $scope.titulo , 'contenido': $scope.contenido, 'categoria': $scope.categoria, 'id_usuario': user , file: $scope.imagefile}

			}).then(function success (response) {

				$mdDialog.hide(response.data);

			}, function error (response) {

				$scope.onuse = false;
				$scope.errormsg = "Error: " + response.status + ": " + response.data;
			});

		};

		$scope.close = function() {
			$mdDialog.cancel();
		};

	}])

	.controller('AnuncioController', ['$scope', '$routeParams', '$http', function ($scope, $routeParams, $http) {
		var anuncio_id = $routeParams.id;
		var route = "http://pruebas.evolucionmarketing.com/anuncios/api/anuncio/" + anuncio_id;

		$http.get(route)
		.then(function success (response) {

			var data_anuncio = response.data;
			$scope.anuncio = data_anuncio[0];

			console.log(new Date( Date.parse(data_anuncio[0].created_at)));

		}, function error () {

			//Aqui se maneja el error
		});
	}])

	.controller('ProfileController', ['$scope', '$http', '$localStorage', function ($scope, $http, $localStorage) {

		$scope.storage = $localStorage;

	}])

	.controller('loginController', function($scope, $http, $mdDialog, $localStorage, $window) {
		//Assigning $localstorage to $session.storage 
		$scope.$storage = $localStorage;

	     // create a blank object to handle form data.
	     $scope.user = {};
	     // calling our submit function.
	     $scope.submitForm = function() {
	         // Posting data to php file
	         $http({
	         	method  : 'POST',
	         	url     : 'http://pruebas.evolucionmarketing.com/anuncios/api/login',
	             data    : $scope.user, //forms user object
	             headers : {'Content-Type': 'application/json; charset=utf-8'}
	         }).then(function successCallback(response) {

	         	if (response.data == "El usuario o contraseña es incorrecto"){
	         		$mdDialog.show(
	         			$mdDialog.alert()
	         			.parent(angular.element(document.querySelector('#popupContainer')))
	         			.clickOutsideToClose(true)
	         			.title('Error')
	         			.textContent(response.data)
	         			.ariaLabel('Alert Dialog Demo')
	         			.ok('Volver a intentar')
	         			);
	         	}else{
	         		//console.log(response);

	         		//Assign session values
					$localStorage.userid = response.data[0].id
					$localStorage.email = response.data[0].email
					$localStorage.nombre = response.data[0].nombre

					//Redirects to index
					$window.location.href = '..angularjs/index.html';
	         	}
	         }, function errorCallback(response) {
	         });
	     };
	 })

	.controller('signUpController', function($scope, $http, $localStorage, $window) {
		//Assigning $localstorage to $session.storage 
		$scope.$storage = $localStorage;

	    // create a blank object to handle form data.
	    $scope.user = {};
	    // calling our submit function.
	    $scope.submitForm = function() {
	        // Posting data to php file
	        $http({
	        	
	            method  : 'POST',
	            url     : 'http://pruebas.evolucionmarketing.com/anuncios/api/registro',
	            data    : $scope.user, //forms user object
	            headers : {'Content-Type': 'application/json; charset=utf-8'}

	        }).then(function success(response) {

	            /*if (data.errors) {
	                // Showing errors.
	                $scope.errorName = data.errors.name;
	                $scope.errorEmail = data.errors.email;
	                $scope.errorPassword = data.errors.password;
	            } else {
	                $scope.message = data.message;
	            }*/

	            $scope.message = response.data;

	        }, function error(response) {
	        });
	    };
	});

})();
