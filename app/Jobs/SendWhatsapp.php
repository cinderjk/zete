<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Device;
use App\Models\MessageLog;
use App\Services\Baileys;
use Illuminate\Support\Facades\Log;

class SendWhatsapp implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user_id, $device_id, $phone, $message;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user_id, $device_id, $phone, $message)
    {
        $this->user_id = $user_id;
        $this->device_id = $device_id;
        $this->phone = $phone;
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $device = Device::find($this->device_id);
        $send = Baileys::make()->sendMessage($this->device_id, $this->phone, $this->message);
        Log::info($send);
        if(isset($send['result']->status) && $send['result']->status === 'PENDING') {
            MessageLog::create([
                'user_id' => $this->user_id,
                'device_name' => $device->name,
                'to' => $this->phone,
                'message' => json_encode($send['message']),
                'status' => 200
            ]);
        } else {
            MessageLog::create([
                'user_id' => $this->user_id,
                'device_name' => $device->name,
                'to' => $this->phone,
                'message' => json_encode($send['message']),
                'status' => 500
            ]);
        }
    }
}
