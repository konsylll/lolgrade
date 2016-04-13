<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ApiController extends Controller
{
    public $api = null;
    public function __construct()
    {
        $this->api = app('ApiService');
    }
    //These methods are test
    public function getID(){
        echo($this->api->getID('fdgsdfgfdsgfg', 'euw'));
    }
    public function getParticipants(){
        $id = $this->api->getID('Korean Albino', 'euw');
        dd($this->api->getParticipants($id, 'EUW1'));
    }
    //stop
    
    public function getParticipantsMaxGrades(Request $request){
        $r = $request->all();
        $server = strtolower($r['server']);
        $id = $this->api->getID($r['nickname'], $server);
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
        $participants = $this->api->getParticipants($id, $server, $serverID);
        return $this->api->insertMaxGrades($participants, $server, $serverID);
    }
}
