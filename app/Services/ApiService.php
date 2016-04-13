<?php
/**
 * Created by PhpStorm.
 * User: mboichuk
 * Date: 12.04.16
 * Time: 13:19
 */

namespace App\Services;
use Guzzle\Http\Client;


class ApiService
{
    public static $AMOUNT_OF_RETRIEVES = 200;
    public static $NO_GRADE = 'NG';
    public function __construct()
    {
        $this->guzzle = new Client('');
    }

    public function getID($name, $server){
        $response = $this->guzzle->get('https://'.$server.'.api.pvp.net/api/lol/'.$server.'/v1.4/summoner/by-name/'
            .$name.'?api_key=6afe71bf-c760-46b5-9a52-f4ceeb8aa978')->send()->json();

        $noSpaceName = str_replace(" ", "", $name);
        return $response[strtolower($noSpaceName)]['id'];
    }

    public function getParticipants($id, $server, $serverID){
        return $this->guzzle->get('https://'.$server.'.api.pvp.net/observer-mode/rest/consumer/getSpectatorGameInfo/'
        .$serverID.'/'.$id.'?api_key=6afe71bf-c760-46b5-9a52-f4ceeb8aa978')->send()->json()['participants'];
    }

    public function insertMaxGrades($people, $server, $serverID){
        $allGrades = [];
        $count = 0;//TODO remove after MTP
        foreach($people as $summ){
            $grade = $this->guzzle->get('https://'.$server.'.api.pvp.net/championmastery/location/'
                .$serverID.'/player/'.$summ['summonerId'].'/topchampions?count='
                .ApiService::$AMOUNT_OF_RETRIEVES.'&api_key=6afe71bf-c760-46b5-9a52-f4ceeb8aa978')->send()->json();
            array_push($allGrades, $grade);
            if($count == 4){  //TODO remove these after MTP
                sleep(10);    //TODO remove these after MTP
            }                 //TODO remove these after MTP
            $count++;         //TODO remove these after MTP
        }

        $found = 0;
        for ($i=0; $i<10; $i++){
            foreach ($allGrades[$i] as $champGrade){
                if(isset($champGrade['highestGrade'])){
                  if(!strcmp($people[$i]['championId'],$champGrade['championId'])){
                       //array_push($grades,$champGrade['highestGrade']);
                       $people[$i]['highestGrade'] = $champGrade['highestGrade'];
                       $found = 1;
                  }
                }
            }
            if(!$found){
                //array_push($grades,ApiService::$NO_GRADE);
                $people[$i]['highestGrade'] = ApiService::$NO_GRADE;
            }
            $found = 0;
        }
        return $people;
    }
}