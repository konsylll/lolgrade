angular.module('lolgrade').controller('ResultCtrl', function($scope, ApiService, ChampionService, $state, $stateParams){
    ChampionService.getChamps($scope);
    $scope.summoners = $state.params.summoners;

});