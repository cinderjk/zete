<?php
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
        $base_url = config('app.wa_api_url');
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $base_url . "/sessions/status/" . $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));
        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result);
    }
}

if(! function_exists('addSession')){
    function addSession($id, $isLegacy){
        $base_url = config('app.wa_api_url');
        $curl = curl_init();
        // new post
        $data = array(
            'id' => $id,
            'isLegacy' => $isLegacy
        );
        curl_setopt_array($curl, array(
            CURLOPT_URL => $base_url . "/sessions/add",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json"
            ),
        ));
        $result = curl_exec($curl);
        curl_close($curl);
        return json_decode($result);
    }
}

if(! function_exists('removeSession')){
    function removeSession($id){
        $base_url = config('app.wa_api_url');
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $base_url . "/sessions/delete/" . $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "DELETE",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json"
            ),
        ));
        $result = curl_exec($curl);
        curl_close($curl);
        return json_decode($result);
    }
}

if(! function_exists('sendMessages')){
    function sendMessages($id, $receiver, $message){
        $base_url = config('app.wa_api_url');
        // check if receiver number start with 0, and replace with 62
        if(substr($receiver, 0, 1) == '0'){
            $receiver = '62' . substr($receiver, 1);
        }
        $curl = curl_init();
        // new post
        $data = array(
            'receiver' => $receiver,
            'message' => [
                'text' => $message
            ]
        );
        curl_setopt_array($curl, array(
            CURLOPT_URL => $base_url . "/chats/send?id=" . $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json"
            ),
        ));
        $result = curl_exec($curl);
        curl_close($curl);
        $data = [
            'receiver' => $receiver,
            'message' => $message,
            'result' => json_decode($result)
        ];
        return $data;
    }
}

// FOR API
if(! function_exists('chatSend')){
    function chatSend($device_id, $phone, $message){
        $base_url = config('app.wa_api_url');
        // check if phone number start with 0, and replace with 62
        if(substr($phone, 0, 1) == '0'){
            $phone = '62' . substr($phone, 1);
        }
        $curl = curl_init();
        // new post
        $data = array(
            'receiver' => $phone,
            'message' => $message
        );
        curl_setopt_array($curl, array(
            CURLOPT_URL => $base_url . "/chats/send?id=" . $device_id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json"
            ),
        ));
        $result = curl_exec($curl);
        curl_close($curl);
        return json_decode($result);
    }
}