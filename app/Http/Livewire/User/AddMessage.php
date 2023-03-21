<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\MessageLog;
use App\Models\Device;

class AddMessage extends Component
{
    static $randomMessage = [
        "Rather than love, than money, than fame, give me truth.",
        "Capital can do nothing without brains to direct it.",
        "The best way to cheer yourself up is to try to cheer somebody else up.",
        "Half the time men think they are talking business, they are wasting time.",
        "Don't slay dragons that aren't in your way",
        "When I died last, and dear, I die As often as from thee I go.",
        "Glory is fleeting, but obscurity is forever.",
        "I guess happiness is not a state you want to be in all the time.",
        "Success is more attitude then aptitude.",
        "For success, attitude is equally as important as ability.",
        "Keep true to the dreams of your youth.",
        "Lesser artists borrow, great artists steal.",
        "Life should be great rather than long.",
        "The internet is a great way to get on the net.",

        "Hello!",
        "¡Hola!",
        "Bonjour!",
        "Hallo!",
        "Ciao!",
        "Hej!",
        "Olá!",
        "Salut!",
        "Bonan tagon!",
        "Halò!",
        "Kamusta!",
        "Kaixo!",
    ];

    public $to, $message, $device_id, $device_name, $devices = [];

    public function mount()
    {
        $this->devices = Device::where('user_id', auth()->user()->id)->where('status', true)->get();   
        if(count($this->devices) > 0){
            $this->device_id = $this->devices[0]->id;
            $this->device_name = $this->devices[0]->name;
        }
    }

    public function randomMessage()
    {
        $this->message = self::$randomMessage[array_rand(self::$randomMessage)];
    }

    public function add()
    {
        if($this->device_id == ''){
            return $this->addError('device_id', 'Please select a device');
        }
        $checkDevice = Device::where('user_id', auth()->user()->id)->where('id', $this->device_id)->first();
        if(!$checkDevice){
            return $this->addError('device_id', 'Please select a valid device');
        }
        $this->validate([
            'to' => 'required',
            'message' => 'required',
        ]);
        $send = sendMessages($this->device_id, $this->to, $this->message);
        $result = $send['result'];
        if($result->status == "PENDING") {
            MessageLog::create([
                'user_id' => auth()->user()->id,
                'device_name' => $this->device_name,
                'to' => $send['receiver'],
                'message' => $send['message'],
                'status' => 200
            ]);
            $this->dispatchBrowserEvent('message', ['type' => 'success', 'message' => 'Message sent successfully']);
        } else {
            MessageLog::create([
                'user_id' => auth()->user()->id,
                'device_name' => $this->device_name,
                'to' => $send['receiver'],
                'message' => $send['message'],
                'status' => 500
            ]);
            $this->dispatchBrowserEvent('message', ['type' => 'error', 'message' => 'Message sending failed']);
        }
        $this->reset([
            'message'
        ]);
    }

    public function render()
    {
        return view('livewire.user.add-message');
    }
}
