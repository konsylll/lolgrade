angular.module('lolgrade').controller('ResultCtrl', function($scope, $location, ApiService, ChampionService, CachingService, $state, SpellService, $timeout){

    //Summoner Spells parser
    this.getSpellUrl = function(id){
        return SpellService.getSpellUrl(id);
    }

    //Main mastery image parser
    this.getTopMastery = function(masteryArr){
        return SpellService.getTopMastery(masteryArr);
    }

    //Get ID - Name dependencies
    ChampionService.getChamps($scope);

    //Setting data got from Api Service
    var team100 = $state.params.summonersTeam100;
    var team200 = $state.params.summonersTeam200;
    var requesterId = $state.params.summoner;
    var gameMode = ApiService.formatStr($state.params.gameMode);
    var server = $('#server option:selected').text();

    //Taking all info about requester
    $scope.requester = ApiService.getRequester(team100, team200);

    //For 3 vs 3
    $scope.is3 = ApiService.is3vs3(team100, team200);

    //Passing teams data to view
    $scope.summonersTeam100 = team100;
    $scope.summonersTeam200 = team200;

    //Setting game mode and server
    $scope.gameMode = gameMode;
    $scope.server = ApiService.serverParse(server);

    //Triggers when click on summoner in the result set. Prepares the data for detailed summoner info
    this.goSummoner = function(team, summonerId){
        //Taking data
        if (team == 100){
            var summoner = team100[summonerId];
            summoner['allGrades'] = $state.params.allGrades[summonerId];
        } else if (team == 200){
            var summoner = team200[summonerId];
            summoner['allGrades'] = $state.params.allGrades[summonerId+team100.length];
        }

        //Go to detailed summ info page
        $state.go('info', {
            'summonersTeam100': team100,
            'summonersTeam200': team200,
            'allGrades': $state.params.allGrades,
            summoner: summoner,
            redirected: 1,
            gameMode: gameMode
        });
    }
});