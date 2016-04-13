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
}).service('ApiService', function ($http, $state) {
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
           console.log(response.data.status.status_code);
           if (Object.prototype.toString.call(response) === '[object Array]'){
               $state.go('result');
           }
           if (response.data.status.status_code == 404){
               $state.go('404');
           }
           if(response.data.status.status_code == 426){
               $state.go('overload');
           }
           if(response.data.status.status_code == 403){
               $state.go('404');
           }
           //$state.go('result');
       });
   }
});