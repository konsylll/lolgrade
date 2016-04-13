/**
 * Created by mboichuk on 13.04.16.
 */
angular.module('lolgrade', [
    'ngResource',
    'ngRoute',
    'ui.router'
]).config(function ($stateProvider) {
    $stateProvider.state('main', {
        url:"",
        templateUrl: "views/main.php"
    }).state('result', {
        url:"/result",
        templateUrl: "views/result.php"
    }).state('404', {
        url:"/404",
        templateUrl: "views/404.php"
    }).state('overload', {
        url: "/overload",
        templateUrl: "views/overload.php"
    });
}).service('ApiService', function ($http) {
   this.champions = [];


   this.getData = function(scope) {
       scope.isDisabled = true;
       var nickname = $('#nickname')[0].value;
       var server = $('#server option:selected').text();
       console.log(server);
       $http.post(
           '/grades',
           {
               nickname: nickname,
               server: server
           }).then(function(response){
           console.log(response);
           scope.isDisabled = false;
       });
   }
});