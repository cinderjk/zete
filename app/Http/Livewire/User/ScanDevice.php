<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Device;
use Illuminate\Support\Facades\Cache;

class ScanDevice extends Component
{
    public $device_id;
    public $legacy;
    public $status;
    public $qr_data;

    public $text;
    public $show_refresh = false;

    public function mount($id)
    {
        $d = Device::find($id);
        if(!$d) {
            return to_route('device')->with('message', 'Device not found');
        }
        $this->device_id = $d->id;
        $this->legacy = $d->legacy;
        $this->status = $d->status;
        $this->text = 'Loading...';
    }

    public function getQRData()
    {
        if(Cache::has('device_id_qr_'.$this->device_id)) {
            return $this->qr_data = Cache::get('device_id_qr_'.$this->device_id);
        }
        removeSession($this->device_id);
        $add = addSession($this->device_id, $this->legacy);
        if($add->success == false) {
            $this->show_refresh = true;
            return $this->text = "Please try again 30 seconds later";
        }
        $this->qr_data = $add->data->qr;
        return Cache::put('device_id_qr_'.$this->device_id, $this->qr_data, 15);
    }

    public function render()
    {
        return view('livewire.user.scan-device');
    }
}
