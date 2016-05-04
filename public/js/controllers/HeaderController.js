angular.module('lolgrade').controller('HeaderCtrl', function($scope, ApiService, AutofillService, CachingService){

    AutofillService.getAutofillData($scope);
    $('#nickname')[0].value = $scope.autofill.nickname;
    $('#server').val($scope.autofill.server);

    this.getData = function(){
        ApiService.getData($scope);
    }
});