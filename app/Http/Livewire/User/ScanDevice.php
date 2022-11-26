<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Device;

class ScanDevice extends Component
{
    public $device_id;
    public $status;

    public function mount($id)
    {
        $d = Device::find($id);
        if(!$d) {
            return to_route('device')->with('message', 'Device not found');
        }
        $this->device_id = $d->id;
        $this->status = $d->status;
    }

    public function render()
    {
        return view('livewire.user.scan-device');
    }
}
