'use strict';

/* Services */


// Demonstrate how to register services
// In this case it is a simple value service.
angular.module('myApp.services', []).
  factory('myTest', function(){

    var tests = [
      {Test: "Test1"},
      {Test: "Test2"},
      {Test: "Test3"}
    ]
    return {
      getTest: tests
    };
})

  .factory('myUsers', function(){

    self.users = this.users = [
      {Name: 'Sterling Mallory Archer', Location: 'ISIS'},
      {Name: 'Lana Kane', Location: 'ISIS'},
      {Name: 'Other Barry', Location: 'Oden'}
    ];
    return {
      getUser: function(users){
        return self.users[1];
      }
    }

});
