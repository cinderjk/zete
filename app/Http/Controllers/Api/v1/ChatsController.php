<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jobs\MakeMessageLog;

class ChatsController extends Controller
{
    public $base_url;

    public function __construct()
    {
       $this->base_url = config('app.wa_api_url');
    }

    // chats
    public function send(Request $request)
    {
        if(!auth()->user()){
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized',
            ], 401);
        }

        $device_id = $request->device_id;
        $phone = $request->phone;
        $message = $request->message;

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
            CURLOPT_URL => $this->base_url . "/chats/send?id=" . $device_id,
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
        $result = json_decode($result);
        if($result->success == true){
            MakeMessageLog::dispatch($device_id, $phone, $message);
        } else {
            MakeMessageLog::dispatch($device_id, $phone, $message, 500);
        }
        return response()->json($result);
     }
}
