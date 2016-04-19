angular.module('lolgrade').controller('ResultCtrl', function($scope, ApiService, ChampionService, $state){
    if(!$state.params.redirected) {
        window.location.replace("/");
    }
    ChampionService.getChamps($scope);

    var team100 = $state.params.summonersTeam100;
    var team200 = $state.params.summonersTeam200;

    $scope.summonersTeam100 = team100;
    $scope.summonersTeam200 = team200

    this.goSummoner = function(team, summonerId){
        var summonerGrades = $state.params.allGrades[summonerId];
        if (team == 100){
            var summoner = team100[summonerId];
        } else if (team == 200){
            var summoner = team200[summonerId];
        }
        summoner['allGrades'] = summonerGrades;
        $state.go('info', {
            summoner: summoner,
            redirected: 1
        });
    }
});