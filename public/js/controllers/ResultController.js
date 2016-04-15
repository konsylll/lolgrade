angular.module('lolgrade').controller('ResultCtrl', function($scope, ApiService, ChampionService, $state){
    if(!$state.params.redirected) {
        window.location.replace("/");
    }
    ChampionService.getChamps($scope);
    $scope.summonersTeam100 = $state.params.summonersTeam100;
    $scope.summonersTeam200 = $state.params.summonersTeam200;
    console.log($state.params.summonersTeam100);
});