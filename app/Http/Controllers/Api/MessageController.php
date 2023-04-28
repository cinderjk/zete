<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jobs\MakeMessageLog;
use App\Models\MessageLog;
use App\Models\Device;
use App\Services\Baileys;

class MessageController extends Controller
{
    public $base_url;

    public function __construct()
    {
       $this->base_url = config('app.wa_api_url');
    }

    /**
     * Sends a message using the provided request data.
     *
     * @param \Illuminate\Http\Request $request The request object containing the necessary data.
     * @return \Illuminate\Http\JsonResponse The JSON response containing the result of the message sending.
     */

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

        $send = Baileys::make()->sendMessage($device_id, $phone, $message);
        if(isset($send['result']->status) && $send['result']->status === 'PENDING') {
            $status = 200;
        } else {
            $status = 500;
        }
        if(config('app.use_job_queue')){
            MakeMessageLog::dispatch($device_id, $phone, $message, $status);
        } else {
            $device = Device::find($device_id);
            MessageLog::create([
                'user_id' => $device->user_id,
                'device_name' => $device->name,
                'to' => $phone,
                'message' => json_encode($message),
                'status' => $status,
            ]);
        }
        return response()->json($send['result']);
    }

    /**
     * Retrieve a list of messages based on the provided request parameters.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @return \Illuminate\Http\JsonResponse The JSON response containing the list of messages.
     */
    public function list(Request $request)
    {
        if(!auth()->user()){
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized',
            ], 401);
        }

        $device_id = $request->device_id;
        $limit = $request->limit;
        $cursor = $request->cursor;

        $chat = Baileys::make()->listMessage($device_id, $limit, $cursor);
        return response()->json($chat);
    }
}
