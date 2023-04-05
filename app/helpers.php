<?php

use App\Services\Baileys;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Cache;

/**
* @method static sessionStatus
* @method static addSession
* @method static removeSession

* @method static sendMessages
**/


if(! function_exists('sessionStatus')){
    function sessionStatus($id){
        return Baileys::make()->sessionStatus($id);
    }
}

if(! function_exists('addSession')){
    function addSession($id, $isLegacy){
        return Baileys::make()->addSession($id, $isLegacy);
    }
}

if(! function_exists('removeSession')){
    function removeSession($id){
        return Baileys::make()->removeSession($id);
    }
}

if(! function_exists('sendMessages')){
    function sendMessages($id, $receiver, $message){
        return Baileys::make()->sendMessages($id, $receiver, $message);
    }
}

// FOR API
if(! function_exists('chatSend')){
    function chatSend($device_id, $phone, $message){
        return Baileys::make()->chatSend($device_id, $phone, $message);
    }
}
