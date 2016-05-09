angular.module('lolgrade').controller('ResultCtrl', function($scope, ApiService, ChampionService, CachingService, $state, SpellService){

    //Identifying type of the game 3vs3 or not   
    function is3vs3(team100, team200){
        var result= false;
        if(team100.length == 3 && team200.length == 3){
            result = true;
        }
        return result;
    }

    //Requester parser
    function getRequester(arr1, arr2, id){
        var requester = arr1.filter(function(player){
            return player.summonerId == id
        }) || arr2.filter(function(player){
            return player.summonerId == id
        });
        console.log(requester);
        return requester;
    }

    //Summoner Spells parser
    this.getSpellUrl = function(id){
        return SpellService.getSpellUrl(id);
    }

    //Main mastery image parser
    this.getTopMastery = function(masteryArr){
        return SpellService.getTopMastery(masteryArr);
    }


    //Redirect if went manually
    if(!$state.params.redirected) {
        window.location.replace("/");
    }

    //Get ID - Name dependencies
    ChampionService.getChamps($scope);

    //Setting data got from Api Service
    var team100 = $state.params.summonersTeam100;
    var team200 = $state.params.summonersTeam200;
    var requesterId = $state.params.summoner;

    //Taking all info about requester
    $scope.requester = getRequester(team100, team200, requesterId);

    //For 3 vs 3
    $scope.is3 = is3vs3(team100, team200);

    //Passing teams data to view
    $scope.summonersTeam100 = team100;
    $scope.summonersTeam200 = team200;

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
            redirected: 1
        });
    }
});