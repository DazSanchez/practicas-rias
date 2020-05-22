((ng, Rx) => {
  const { BehaviorSubject } = Rx;
  const app = ng.module('app', []);

  const store = new BehaviorSubject([]);
  const state$ = store.asObservable();

  const updateStore = newState => {
    const currentState = store.value;
    store.next([...currentState, newState]);
  };

  app.filter('temperature', function () {
    return function (temp) {
      if (!temp) return null;

      if (Number.isNaN(Number.parseFloat(temp.value))) return temp.value;

      if (temp.type == 0) return `${temp.value} °C`;
      else if (temp.type == 1) return `${temp.value} °F`;
      else if (temp.type == 2) return `${temp.value} °K`;
      return 'El tipo de temperatura no es válido';
    };
  });

  app.controller('FormController', [
    '$scope',
    '$http',
    function ($scope, $http) {
      $scope.conversion = {
        type: 1,
        value: 0,
      };

      $scope.convert = function () {
        $http
          .post('/api/conversion.php', $scope.conversion)
          .then(({ data }) => {
            const json = ng.fromJson(data);
            updateStore(json.data);
          })
          .catch(({ data }) => {
            const json = {
              conversion: $scope.conversion,
              result: {
                value: data.message,
                type: 0,
              },
            };
            updateStore(json);
          });
      };
    },
  ]);

  app.controller('TableController', [
    '$scope',
    function ($scope) {
      state$.subscribe(items => {
        $scope.items = items;
      });
    },
  ]);
})(angular, window.rxjs);
