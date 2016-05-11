angular.module('lolgrade').service('SpellService', function () {
	this.getSpellUrl = function(id){
		var urlTemplate = "https://ddragon.leagueoflegends.com/cdn/5.24.2/img/spell/Summoner";
		switch(id){
			case 1: urlTemplate = urlTemplate+"Boost.png";
			break;
			case 2: urlTemplate = urlTemplate+"Clairvoyance.png";
			break;
			case 3: urlTemplate = urlTemplate+"Exhaust.png";
			break;
			case 4: urlTemplate = urlTemplate+"Flash.png";
			break;
			case 6: urlTemplate = urlTemplate+"Haste.png";
			break;
			case 7: urlTemplate = urlTemplate+"Heal.png";
			break;
			case 11: urlTemplate = urlTemplate+"Smite.png";
			break;
			case 12: urlTemplate = urlTemplate+"Teleport.png";
			break;
			case 13: urlTemplate = urlTemplate+"Mana.png";
			break;
			case 14: urlTemplate = urlTemplate+"Dot.png";
			break;
			case 17: urlTemplate = urlTemplate+"OdinGarrison.png";
			break;
			case 21: urlTemplate = urlTemplate+"Barrier.png";
			break;
			case 30: urlTemplate = urlTemplate+"PoroRecall.png";
			break;
			case 31: urlTemplate = urlTemplate+"PoroThrow.png";
			break;
			case 32: urlTemplate = urlTemplate+"Snowball.png";
			break;
			case 31: urlTemplate = urlTemplate+"PoroThrow.png";
		}
		return urlTemplate;
	}

	this.getTopMastery = function(masteryArr){
		var urlTemplate = "http://ddragon.leagueoflegends.com/cdn/6.9.1/img/mastery/";
		var masteryString = "";
		var found = 0;
		for(var i = 0; i < masteryArr.length; i++){
			masteryString = "" + masteryArr[i].masteryId;
			if(masteryString.search(/6161|6162|6164|6361|6362|6363|6261|6262|6263/) == 0){
				urlTemplate = urlTemplate + masteryArr[i].masteryId + ".png";
				found = 1;
				break;
			}
		}

		if(!found){
			urlTemplate = null;
		}

		return urlTemplate;
	}

});