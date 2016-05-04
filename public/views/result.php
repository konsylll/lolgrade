<div class = "bg-result">
    <div class = "row team-100">
        <div class="col-md-2 col-sm-2 col-xs-2" ng-show="is3"></div>
        <div class="col-md-2 col-sm-2 col-xs-2 compressed" ng-repeat="summoner in summonersTeam100">
            <div class="flow-summoner" ng-click="result.goSummoner(100, $index)">
                <img class="img-summoner" src="http://ddragon.leagueoflegends.com/cdn/img/champion/loading/{{champions[summoner.championId]}}_0.jpg">
                <p class="nickname">{{summoner.summonerName}}</p>
                <p class="grade {{summoner.highestGrade}}">{{summoner.highestGrade}}</p>
                <div class="shadowed"></div>
                <p class="pts {{summoner.ranked[0].tier}}">{{summoner.ranked[0].entries[0].leaguePoints}}</p>
                <p class="division {{summoner.ranked[0].tier}}">{{summoner.ranked[0].entries[0].division}}</p>
                <img class="rank" src="../img/Tiers/{{summoner.ranked[0].tier}}.png">
            </div>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-2" ng-show="is3"></div>
    </div>
    <div class="row versus text-center">VS</div>
    <div class="row team-200">
        <div class="col-md-2 col-sm-2 col-xs-2" ng-show="is3"></div>
        <div class="col-md-2 col-sm-2 col-xs-2 compressed" ng-repeat="summoner in summonersTeam200">
            <div class="flow-summoner" ng-click="result.goSummoner(200, $index)">
                <img class="img-summoner" src="http://ddragon.leagueoflegends.com/cdn/img/champion/loading/{{champions[summoner.championId]}}_0.jpg">
                <p class="nickname">{{summoner.summonerName}}</p>
                <p class="grade {{summoner.highestGrade}}">{{summoner.highestGrade}}</p>
                <div class="shadowed"></div>
                <p class="pts {{summoner.ranked[0].tier}}">{{summoner.ranked[0].entries[0].leaguePoints}}</p>
                <p class="division {{summoner.ranked[0].tier}}">{{summoner.ranked[0].entries[0].division}}</p>
                <img class="rank" src="../img/Tiers/{{summoner.ranked[0].tier}}.png">
            </div>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-2" ng-show="is3"></div>
    </div>
</div>