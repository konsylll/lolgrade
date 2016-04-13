angular.module('lolgrade').controller('ResultCtrl', function($scope, ApiService){
    this.sendData = function(name, server){
        $result = ApiService.sendData(name, server);
        console.log(result);
    }
});