<?php
/**
 * Created by PhpStorm.
 * User: mboichuk
 * Date: 12.04.16
 * Time: 13:19
 */

namespace App\Services;
use Guzzle\Common\Exception\GuzzleException;
use Guzzle\Http\Client;
use Guzzle\Http\Exception\BadResponseException;


class ApiService
{
    public static $AMOUNT_OF_RETRIEVES = 200;
    public static $NO_GRADE = 'NG';
    private static $API_KEY;
    public function __construct()
    {
        ApiService::$API_KEY = env('LOL_API_KEY');
        $this->guzzle = new Client('');
    }

    public function getID($name, $server){
        try {
            $response = $this->guzzle->get('https://' . $server . '.api.pvp.net/api/lol/' . $server . '/v1.4/summoner/by-name/'
                . $name . '?api_key='.ApiService::$API_KEY)->send();
        } catch (BadResponseException $e){
            return $e;
        } catch (\Exception $e){
            return $e;
        }

        $responseBody = $response->json();

        $noSpaceName = str_replace(" ", "", $name);
        return $responseBody[mb_strtolower($noSpaceName, 'UTF-8')]['id'];
    }

    private function getRankedQuery($participants, $server){
        $query = "https://".$server.".api.pvp.net/api/lol/".$server.    "/v2.5/league/by-summoner/";
        foreach ($participants as $participant){
            $query = $query.$participant['summonerId'].",";
        }
        $query = rtrim($query, ",");
        $query = $query."/entry?api_key=".ApiService::$API_KEY;
        try {
            $ranked = $this->guzzle->get($query)->send()->json();
        } catch (BadResponseException $e){
            return $e->getResponse()->getBody();
        } catch (\Exception $e){
            return 'Invalid data passed. Please check the data.';
        }
        return $ranked;
    }

    public function getParticipants($id, $server, $serverID){
        try {
            return $this->guzzle->get('https://' . $server . '.api.pvp.net/observer-mode/rest/consumer/getSpectatorGameInfo/'
                . $serverID . '/' . $id . '?api_key='.ApiService::$API_KEY)->send()->json();
        } catch (BadResponseException $e){
            return $e;
        } catch (\Exception $e){
            return $e;
        }
    }

    public function getChampNames(){
        try {
            return $list = $this->guzzle->get('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/champion'
                .'?api_key='.ApiService::$API_KEY)->send()->json();
        } catch (BadResponseException $e){
            return $e->getResponse()->getBody();
        } catch (\Exception $e){
            return 'Invalid data passed. Please check the data.';
        }
    }
    
    public function insertMaxGrades($people, $server, $serverID){
        $gameMode = $people['gameMode'];
        $people = $people['participants'];
        $allGrades = [];
        $count = 0;//TODO remove after MTP This is a pause needed for dev api key (48, 58-62)
        foreach($people as $summ){
            try {
                $grade = $this->guzzle->get('https://'.$server.'.api.pvp.net/championmastery/location/'
                    .$serverID.'/player/'.$summ['summonerId'].'/topchampions?count='
                    .ApiService::$AMOUNT_OF_RETRIEVES.'&api_key='.ApiService::$API_KEY)->send()->json();
            } catch (BadResponseException $e){
                return $e;
            } catch (\Exception $e){
                return $e;
            }
            array_push($allGrades, $grade);
            if($count == 6){  //TODO remove these after MTP
                sleep(10);    //TODO remove these after MTP
            }                 //TODO remove these after MTP
            $count++;         //TODO remove these after MTP
        }

        $found = 0;
        for ($i=0; $i<count($people); $i++){
            foreach ($allGrades[$i] as $champGrade){
                if(isset($champGrade['highestGrade'])){
                  if(!strcmp($people[$i]['championId'],$champGrade['championId'])){
                       $people[$i]['highestGrade'] = $champGrade['highestGrade'];
                       $found = 1;
                  }
                }
            }
            if(!$found){
                $people[$i]['highestGrade'] = ApiService::$NO_GRADE;
            }
            $found = 0;
        }

        $ranked = $this->getRankedQuery($people, $server);
        if($ranked instanceof BadResponseException){
            return $ranked;
        } elseif ($ranked instanceof \Exception) {
            return $ranked;
        }

        return [$people,$allGrades, $ranked, $gameMode];
    }
}