<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\MessageLog;
use App\Models\Device;

class MakeMessageLog implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user_id, $device_name, $phone, $message, $status;
   
    public function __construct($id, $phone, $message, $status = 200)
    {
        $device = Device::find($id);
        $this->user_id = $device->user_id;
        $this->device_name = $device->name;
        $this->phone = $phone;
        $this->message = json_encode($message);
        $this->status = $status;
    }

    public function handle()
    {
        MessageLog::create([
            'user_id' => $this->user_id,
            'device_name' => $this->device_name,
            'to' => $this->phone,
            'message' => $this->message,
            'status' => $this->status,
        ]);
    }
}
