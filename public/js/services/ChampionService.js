angular.module('lolgrade').service('ChampionService', function($http){

    this.getChamps = function(scope){
        $http.get('champion.json').then(function(response){
            var championsList = {};
            var champions = response.data.data;
            for(var champName in champions){
                if (!champions.hasOwnProperty(champName)) continue;
                var champObj = champions[champName];
                championsList[champObj.key] = champName;
            }
            scope.champions = championsList;
        });
    }

});