'use strict';

/* Filters */

angular.module('myApp.filters', []).
  filter('interpolate', ['myTest', function(test) {
    return function(obj) {
      return self.obj = myTest.getTests 
    }
  }]);
