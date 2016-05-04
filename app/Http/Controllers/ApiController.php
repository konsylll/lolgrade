<?php

namespace App\Http\Controllers;

use Guzzle\Http\Exception\BadResponseException;
use Illuminate\Http\Request;

use App\Http\Requests;

class ApiController extends Controller
{
    public $api = null;
    public function __construct()
    {
        $this->api = app('ApiService');
    }

    public function getChampNames(){
        return $this->api->getChampNames();
    }
    
    public function getParticipantsMaxGrades(Request $request){
        //Getting request data and setting to variables
        $r = $request->all();
        $server = strtolower($r['server']);
        //caching if
        if(!$r['id']){
            $id = $this->api->getID($r['nickname'], $server);
        } else {
            $id = $r['id'];
        }

        //404
        if($id instanceof BadResponseException){
            return $id->getResponse()->getBody();
        } elseif ($id instanceof \Exception) {
            return $id->getCode();
        }

        //Overwriting server names due to changed names in api request
        if(!strcmp($r['server'],'EUNE')){
            $serverID = 'EUN1';
        } else
        if(!strcmp($r['server'],'LAN')){
            $serverID = 'LA1';
        } else
        if(!strcmp($r['server'],'OCE')){
            $serverID = 'OC1';
        } else
        if(!strcmp($r['server'],'LAS')){
            $serverID = 'LA2';
        } else
        if(!strcmp($r['server'],'RU') || !strcmp($r['server'],'KR')){
            $serverID = $r['server'];
        } else {
            $serverID = $r['server'].'1';
        }

        //getting players
        $participants = $this->api->getParticipants($id, $server, $serverID);
        if($participants instanceof BadResponseException){
            return $participants->getResponse()->getBody();
        } elseif ($participants instanceof \Exception) {
            return $participants->getCode();
        }

        //inserting max grades and player id (needs for caching)
        $response = $this->api->insertMaxGrades($participants, $server, $serverID);
        array_push($response, $id);

        return $response;
    }
}
