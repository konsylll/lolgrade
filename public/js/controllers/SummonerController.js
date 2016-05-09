angular.module('lolgrade').controller('SummCtrl', function($scope, ApiService, ChampionService, $state){
    if(!$state.params.redirected) {
        window.location.replace("/");
    }
    function chunk(arr, cols){
        var newArr = [];
        for(var i=0; i<arr.length; i+=cols){
            newArr.push(arr.slice(i,i+cols));
        }
        return newArr;
    }
    ChampionService.getChamps($scope);

    $scope.summoner = $state.params.summoner;
    var filteredGrades = $state.params.summoner.allGrades.filter(function(elem){
        return elem['highestGrade'] != undefined;
    });

    $scope.chunkedGrades = chunk(filteredGrades,5);
    
    this.backToResult = function(){
        $state.go('result',{
            'summonersTeam100': $state.params.summonersTeam100,
            'summonersTeam200': $state.params.summonersTeam200,
            'redirected': 1,
            'allGrades': $state.params.allGrades,
        });
    }
});