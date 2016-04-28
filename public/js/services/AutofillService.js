angular.module('lolgrade').service('AutofillService', function(){
    this.getAutofillData = function(scope){
        scope.autofill = {};
        scope.autofill.server = localStorage.getItem('server') || 'NA';
        scope.autofill.nickname = localStorage.getItem('nickname') || '';
    }
});