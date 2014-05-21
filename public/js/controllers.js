'use strict';

/* Controllers */

angular.module('myApp.controllers', []).
  controller('MyCtrl1',['$scope', 'myTest', function($scope, myTest) {
    $scope.test = myTest.getTest;
  }])

  .controller('MyCtrl2',['$scope', 'myUsers', function($scope, myUsers) {
    $scope.user = myUsers.getUser();
  }]);
