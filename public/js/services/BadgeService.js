angular.module('lolgrade').service('BadgeService', function () {
	
	this.setBadges = function(grades, numberOfChampions){
		grades.forEach(function(summoner, i, grades){
			var template = "../img/";
			var badge = null;
			var hint = null;

			var sumRes = 0;
			summoner.forEach(function(item, i, summoner){
				if(item.highestGrade && item.highestGrade[0] == 'S'){
					sumRes++;
				} 
			});

			if (sumRes > 20){
				badge = template + "Badge_yellow.png";
				hint = "This summoner has played more than 20 champions on S- or higher";
			} 
			if (sumRes > 30){
				badge = template + "Badge_cyan.png";
				hint = "This summoner has played more than 30 champions on S- or higher. Good Job!";
			} 
			if (sumRes > 40){
				badge = template + "Badge_blue.png";
				hint = "This summoner has played more than 40 champions on S- or higher. Great Job!";
			} 
			if (sumRes > 50){
				badge = template + "Badge_violet.png";
				hint = "This summoner has played more than 50 champions on S- or higher. Awesome work!!!";
			}
			if (sumRes > 60){
				badge = template + "Badge_green.png";
				hint = "This summoner has played more than 60 champions on S- or higher. Unbelievable!!!";
			}
			if (sumRes > 90){
				badge = template + "Badge_black.png";
				hint = "This summoner has played more than 90 champions on S- or higher. This guy is a MONSTER!!!!";
			}
			if (sumRes/numberOfChampions == 1){
				badge = template + "Badge_red.png";
				hint = "This summoner has played EVERY CHAMPION on S- or higher. IT'S IMPOSSIBLE!!!!!!!!!";
			}

			grades[i].badge = badge;
			grades[i].hint = hint;
		});
	}
});