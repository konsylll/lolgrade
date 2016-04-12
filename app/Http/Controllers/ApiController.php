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
        echo($this->api->getID('aflkonsyl', 'euw'));
    }
    public function getParticipants(){
        $id = $this->api->getID('Korean Albino', 'euw');
        dd($this->api->getParticipants($id, 'EUW1'));
    }
    //stop
    
    public function getParticipantsMaxGrades(){
        $id = $this->api->getID('BlackPolak', 'euw');
        $participants = $this->api->getParticipants($id, 'EUW1');
        dd($this->api->insertMaxGrades($participants, 'EUW1'));
    }
}
