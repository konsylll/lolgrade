angular.module('lolgrade').service('BadgeService', function () {
	
	

	this.setBadges = function(grades, numberOfChampions){
		grades.forEach(function(summoner, i, grades){
			var template = "../img/";
			var badge = null;

			var sumRes = 0;
			summoner.forEach(function(item, i, summoner){
				if(item.highestGrade && item.highestGrade[0] == 'S'){
					sumRes++;
				} 
			});

			console.log(sumRes);

			if (sumRes/numberOfChampions > 0.1){
				badge = template + "Badge_yellow.png";
			} 
			if (sumRes/numberOfChampions > 0.15){
				badge = template + "Badge_cyan.png";
			} 
			if (sumRes/numberOfChampions > 0.25){
				badge = template + "Badge_blue.png";
			} 
			if (sumRes/numberOfChampions > 0.5){
				badge = template + "Badge_violet.png";
			}
			if (sumRes/numberOfChampions > 0.9){
				badge = template + "Badge_green.png";
			}
			if (sumRes/numberOfChampions > 0.99){
				badge = template + "Badge_black.png";
			}
			if (sumRes/numberOfChampions == 1){
				badge = template + "Badge_red.png";
			}

			grades[i].badge = badge;
		});
	}
});