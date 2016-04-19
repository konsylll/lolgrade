<div class = "row">
    <div class="col-md-3"></div>
    <div class="col-md-4"><button class="btn btn-primary srch-light btn-block marged" ng-click="summ.backToResult()">Back to the game</button></div>
    <div class="col-md-3"></div>
</div>
<div class = "row">
    <div class="col-md-10">
        <p class="article-text big">
            All {{summoner.summonerName}}'s grades
        </p>
    </div>
</div>
<div class = 'row marged' ng-repeat="grades in chunkedGrades">
    <summoner-info ng-repeat="grade in chunkedGrades[$index]"></summoner-info>
</div>
