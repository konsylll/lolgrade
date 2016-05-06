angular.module('lolgrade').controller('ResultCtrl', function($scope, ApiService, ChampionService, CachingService, $state, SpellService){

    function is3vs3(team100, team200){
        var result= false;
        if(team100.length == 3 && team200.length == 3){
            result = true;
        }
        return result;
    }

    this.getSpellUrl = function(id){
        return SpellService.getSpellUrl(id);
    }

    this.getTopMastery = function(masteryArr){
        return SpellService.getTopMastery(masteryArr);
    }

    if(!$state.params.redirected) {
        window.location.replace("/");
    }
    ChampionService.getChamps($scope);

    var team100 = $state.params.summonersTeam100;
    var team200 = $state.params.summonersTeam200;

    $scope.is3 = is3vs3(team100, team200);
    $scope.summonersTeam100 = team100;
    $scope.summonersTeam200 = team200;
    this.goSummoner = function(team, summonerId){
        var summonerGrades = $state.params.allGrades[summonerId];
        if (team == 100){
            var summoner = team100[summonerId];
        } else if (team == 200){
            var summoner = team200[summonerId];
        }
        summoner['allGrades'] = summonerGrades;
        $state.go('info', {
            'summonersTeam100': team100,
            'summonersTeam200': team200,
            'allGrades': $state.params.allGrades,
            summoner: summoner,
            redirected: 1
        });
    }
});