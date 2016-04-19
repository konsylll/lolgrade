<div class = "row">
    <div class="col-md-10">
        <p class="article-text">
            All {{summoner.summonerName}}'s grades
        </p>
    </div>
</div>
<div class = 'row marged' ng-repeat="grades in chunkedGrades">
    <summoner-info ng-repeat="grade in chunkedGrades[$index]"></summoner-info>
</div>
