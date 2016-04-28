angular.module('lolgrade').service('ApiService', function ($http, $state) {

    function makeTeam100(arr){
        return arr.slice(0,arr.length/2);
    }
    function makeTeam200(arr){
        return arr.slice(arr.length/2, arr.length);
    }
    function mix(arr, ranks){
        for(var i=0; i<arr.length; i++){
            arr[i]['ranked'] = ranks[arr[i]['summonerId']]||[{
                    entries: [{
                        division: "",
                        leaguePoints: ""
                    }],
                    tier: "PROVISIONAL"
                }] ;
        }
        return arr;
    }

    this.getData = function (scope) {
        scope.isDisabled = true;
        var nickname = $('#nickname')[0].value;
        var server = $('#server option:selected').text();
        localStorage.setItem('server', server);
        localStorage.setItem('nickname', nickname);
        $http.post(
            '/grades',
            {
                nickname: nickname,
                server: server
            }).then(function (response) {
            scope.isDisabled = false;
            if (Object.prototype.toString.call(response.data) == '[object Array]') {
                console.log(response.data);
                var allGrades = response.data[1];
                var team100 = makeTeam100(response.data[0]);
                var team200 = makeTeam200(response.data[0]);
                var team100 = mix(team100, response.data[2]);
                var team200 = mix(team200, response.data[2]);
                $state.go('result', {
                    allGrades: allGrades,
                    summonersTeam100: team100,
                    summonersTeam200: team200,
                    redirected: 1
                });
            } else if (response.data.status.status_code == 404) {
                $state.go('404');
            } else if (response.data.status.status_code == 426) {
                $state.go('overload');
            } else if (response.data.status.status_code == 403) {
                $state.go('404');
            }
        });
    }
});