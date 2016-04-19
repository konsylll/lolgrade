<div class="row team-100">
    <div class="col-md-2 col-sm-2 col-xs-2 compressed" ng-click="result.goSummoner(100, $index)" ng-repeat="summoner in summonersTeam100">
        <img src="http://ddragon.leagueoflegends.com/cdn/img/champion/loading/{{champions[summoner.championId]}}_0.jpg" class="img-summoner">
        <p class="nickname">{{summoner.summonerName}}</p>
        <p class="grade {{summoner.highestGrade}}">{{summoner.highestGrade}}</p>
    </div>
</div>
<div class="row versus text-center">VS</div>
<div class="row team-200">
    <div class="col-md-2 col-sm-2 col-xs-2 compressed" ng-click="result.goSummoner(200, $index)" ng-repeat="summoner in summonersTeam200">
        <img src="http://ddragon.leagueoflegends.com/cdn/img/champion/loading/{{champions[summoner.championId]}}_0.jpg" class="img-summoner">
        <p class="nickname">{{summoner.summonerName}}</p>
        <p class="grade {{summoner.highestGrade}}">{{summoner.highestGrade}}</p>
    </div>
</div>