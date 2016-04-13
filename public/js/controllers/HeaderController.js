angular.module('lolgrade').controller('HeaderCtrl', function($scope, ApiService){
    this.getData = function(){
        ApiService.getData($scope);
    }
});