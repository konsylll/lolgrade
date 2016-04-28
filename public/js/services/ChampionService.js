angular.module('lolgrade').service('ChampionService', function($http){
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
});