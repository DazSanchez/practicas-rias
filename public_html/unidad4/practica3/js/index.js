angular
  .module('app', ['ngRoute'])
  .config([
    '$routeProvider',
    '$locationProvider',
    function ($routeProvider, $locationProvider) {
      $routeProvider
        .when('/', {
          templateUrl: 'pages/home.html',
          controller: 'HomeController',
        })
        .when('/list', {
          templateUrl: 'pages/list.html',
          controller: 'ListController',
          controllerAs: '$listCtrl',
        })
        .otherwise({
          redirectTo: '/',
        });

      $locationProvider.html5Mode(false).hashPrefix('!');
    },
  ])
  .controller('HomeController', function () {})
  .controller('ListController', [
    '$scope',
    '$http',
    function ($scope, $http) {
      $scope.patients = [];

      $http
        .get('/api/controller/patients.php')
        .then(({ data }) => data)
        .then(({ data }) => {
          $scope.patients = data;
        });

      $scope.open = function (item) {
        alert(
          `Paciente: ${item.name} ${item.firstSurname} ${item.secondSurname} tiene el id ${item.id}`
        );
      };
    },
  ]);
