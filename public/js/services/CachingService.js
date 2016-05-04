angular.module('lolgrade').service('CachingService', function(){
    this.isCached = function(name){
        var result = false;
        if(localStorage.getItem(name)){
            result = true;
        }
        return result;
    }

    this.getCachedId = function(name){
        return localStorage.getItem(name);
    }

    this.setCachedId = function(name, id){
        localStorage.setItem(name, id);
    }
});