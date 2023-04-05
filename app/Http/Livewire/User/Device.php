<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Device as DeviceModel;

class Device extends Component
{
    protected $listeners = ['refresh' => '$refresh'];

    public function checkSession()
    {
        $devices = DeviceModel::where('user_id', auth()->user()->id)->get();
        foreach($devices as $device) {
            $check = sessionStatus($device->id);
            if(isset($check->status)) {
                DeviceModel::where('id', $device->id)->update([
                    'status' => 1
                ]);
                return;
            } else {
                DeviceModel::where('id', $device->id)->update([
                    'status' => 0
                ]);
                return;
            }
        }
    }

    public function disconnect($id)
    {
        $d = DeviceModel::where('id', $id)->where('user_id', auth()->user()->id)->first();
        if(!$d) {
            return to_route('device')->with('message', 'Device not found');
        }
        $remove = removeSession($d->id);
        if(isset($remove->message)) {
            DeviceModel::where('id', $id)->update([
                'status' => 0
            ]);
            return to_route('device')->with('message', 'Session removed');
        }
        return to_route('device')->with('message', 'Session not removed');    
    }

    public function deleteDevice($id)
    {
        $d = DeviceModel::where('id', $id)->where('user_id', auth()->user()->id)->first();
        if(!$d) {
            return to_route('device')->with('message', 'Device not found');
        }
        $remove = removeSession($d->id);
        if(isset($remove->message)) {
            DeviceModel::where('id', $id)->delete();
            return to_route('device')->with('message', 'Device removed');
        }
        return to_route('device')->with('message', 'Session not removed'); 
    }

    public function render()
    {
        $devices = DeviceModel::where('user_id', auth()->user()->id)->get();
        return view('livewire.user.device', compact('devices'));
    }
}
