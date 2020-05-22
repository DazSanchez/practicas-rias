(ng => {
  ng.module('practica1', ['ngRoute'])
    .config([
      '$routeProvider',
      '$locationProvider',
      function ($routeProvider, $locationProvider) {
        $routeProvider
          .when('/', {
            templateUrl: 'pages/welcome.html',
            controller: 'WelcomeCtrl',
          })
          .when('/planets', {
            templateUrl: 'pages/planets.html',
            controller: 'PlanetsCtrl',
            controllerAs: 'planetsCtrl',
          })
          .when('/form', {
            templateUrl: 'pages/form.html',
            controller: 'FormCtrl',
            controllerAs: 'formCtrl',
          })
          .otherwise({
            redirectTo: '/',
          });

        $locationProvider.html5Mode(false).hashPrefix('!');
      },
    ])
    .controller('WelcomeCtrl', function () {})
    .controller('PlanetsCtrl', [
      '$scope',
      function ($scope) {
        $scope.planets = [
          'Mercurio',
          'Venus',
          'Tierra',
          'Marte',
          'J\u00FApiter',
          'Saturno',
          'Urano',
          'Neptuno',
          'Plut\u00F3n',
        ];
      },
    ])
    .controller('FormCtrl', [
      '$scope',
      function ($scope) {
        $scope.num = 0;
        $scope.result = 0;

        $scope.double = function () {
          $scope.result = $scope.num * 2;
        };
      },
    ]);
})(angular);
