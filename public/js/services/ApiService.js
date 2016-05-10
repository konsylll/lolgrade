angular.module('lolgrade').service('ApiService', function ($http, $state, CachingService) {

    //Using for split result array into 2 teams
    function makeTeam(arr, team){
        return arr.filter(function(elem){
            return elem.teamId == team;
        });
    }

    //Adding ranked information to the general result array
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

        //Temporary disabling search button
        scope.isDisabled = true;
        $('#srch')[0].textContent = "Loading...";

        //Getting entered data
        var nickname = $('#nickname')[0].value;
        var server = $('#server option:selected').text();

        //Checking if there is cached nickname
        var id = null;
        if (CachingService.isCached(nickname)){
            id = CachingService.getCachedId(nickname);
        }

        //Saving last entered data
        localStorage.setItem('server', server);
        localStorage.setItem('nickname', nickname);

        //Getting results
        $http.post(
            '/grades',
            {
                nickname: nickname,
                server: server,
                id: id
            }).then(function (response) {

            //Enabling search button back
            scope.isDisabled = false;
            $('#srch')[0].textContent = "Search";

            //Go to another view also filtering data and passing to the next view or 404 or overload
            if (Object.prototype.toString.call(response.data) == '[object Array]') {
                console.log(response.data);
                var allGrades = response.data[1];
                console.log(allGrades);
                var team100 = makeTeam(response.data[0], 100);
                var team200 = makeTeam(response.data[0], 200);
                var team100 = mix(team100, response.data[2]);
                var team200 = mix(team200, response.data[2]);

                var gameMode = response.data[3];

                //Caching ID
                CachingService.setCachedId(nickname, response.data[4]);

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
            } else if (response.data.status.status_code == 429) {
                $state.go('overload');
            } else if (response.data.status.status_code == 403) {
                $state.go('404');
            } else if (response.data.status.status_code == 500) {
                $state.go('overload');
            }
        });
    }
});