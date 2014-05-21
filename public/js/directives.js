'use strict';

/* Directives */


angular.module('myApp.directives', []).
  directive('appVersion', ['myTest', function(myTest) {
    return function(scope, elm, attrs) {
      elm.text(myTest);
    };
  }]);
