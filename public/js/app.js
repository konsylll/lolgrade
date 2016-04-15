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
        templateUrl: "views/result.php",
        controller: "ResultCtrl",
        controllerAs: "result",
        params: {
            'summonersTeam100': null,
            'summonersTeam200': null,
            'redirected': 0
        }
    }).state('404', {
        url:"/404",
        templateUrl: "views/404.php"
    }).state('overload', {
        url: "/overload",
        templateUrl: "views/overload.php"
    });
}).service('ApiService', function ($http, $state) {

    function makeTeam100(arr){
        return arr.slice(0,arr.length/2);
    }
    function makeTeam200(arr){
        return arr.slice(arr.length/2, arr.length);
    }

    this.getData = function (scope) {
        scope.isDisabled = true;
        var nickname = $('#nickname')[0].value;
        var server = $('#server option:selected').text();
        $http.post(
            '/grades',
            {
                nickname: nickname,
                server: server
            }).then(function (response) {
            scope.isDisabled = false;
            if (Object.prototype.toString.call(response.data) == '[object Array]') {
                var team100 = makeTeam100(response.data);
                var team200 = makeTeam200(response.data);
                $state.go('result', {
                    summonersTeam100: team100,
                    summonersTeam200: team200,
                    redirected: 1
                });
            } else if (response.data.status.status_code == 404) {
                $state.go('404');
            } else if (response.data.status.status_code == 426) {
                $state.go('overload');
            } else if (response.data.status.status_code == 403) {
                $state.go('404');
            }
        });
    }
}).service('ChampionService', function($http){
    this.getChamps = function(scope){
        $http.post('/champs').then(function(response){
            var championsList = {};
            var champions = response.data.data;
            for(var champName in champions){
                if (!champions.hasOwnProperty(champName)) continue;
                var champObj = champions[champName];
                championsList[champObj.id] = champName;
            }
            scope.champions = championsList;
        });
    }
}).directive('summoner', function(){
    return {
        templateUrl: 'templates/summoner.php'
    }
});