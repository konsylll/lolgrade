/**
 * Created by mboichuk on 13.04.16.
 */
angular.module('lolgrade', [
    'ngResource',
    'ngRoute',
    'ui.router'
]).config(function ($stateProvider, $urlRouterProvider) {
    $stateProvider.state('main', {
        url:"",
        templateUrl: "views/main.php"
    }).state('/main', {
        url:"/",
        templateUrl: "views/main.php"
    }).state('result', {
        url:"/result",
        templateUrl: "views/result.php",
        controller: "ResultCtrl",
        controllerAs: "result",
        params: {
            'summonersTeam100': null,
            'summonersTeam200': null,
            'redirected': 0,
            'allGrades': null,
            'gameMode': null
        },
        onEnter: function($state, $stateParams){
            if(!$stateParams.redirected) {
                $state.go("main");
            }
        }
    }).state('404', {
        url:"/404",
        templateUrl: "views/404.php"
    }).state('overload', {
        url: "/overload",
        templateUrl: "views/overload.php"
    }).state('info', {
        url: "/info",
        templateUrl: "views/summonerGrades.php",
        controller: "SummCtrl",
        controllerAs: "summ",
        params: {
            'summonersTeam100': null,
            'summonersTeam200': null,
            'allGrades': null,
            'summoner': null,
            'redirected': 0,
            'gameMode': null
        },
        onEnter: function($state, $stateParams){
            if(!$stateParams.redirected) {
                $state.go("main");
            }
        }
    });
    $urlRouterProvider.otherwise('/');
}).directive('summonerInfo', function(){
    return {
        restrict: "E",
        templateUrl: 'templates/summoner.info.php'
    }
}).directive('imgonload', function(){
    return {
        restrict: "A",

        link: function(scope, element){
            element.on('load', function(){
                scope.wait = false;
            });
            scope.$watch('ngSrc', function(){
                scope.wait = true;
            });
        }
    }
});