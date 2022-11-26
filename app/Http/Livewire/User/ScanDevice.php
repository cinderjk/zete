<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Device;

class ScanDevice extends Component
{
    public $device_id;
    public $legacy;
    public $status;
    public $qr_data;

    public function mount($id)
    {
        $d = Device::find($id);
        if(!$d) {
            return to_route('device')->with('message', 'Device not found');
        }
        $this->device_id = $d->id;
        $this->legacy = $d->legacy;
        $this->status = $d->status;
    }

    public function getQRData()
    {
        $add = addSession($this->device_id, $this->legacy);
        if($add->success == true){
            $this->qr_data = $add->data->qr;
        } else {
            $this->removeSessionData();
            $this->dispatchBrowserEvent('message', ['type' => 'warning',  'message' => 'New QR Code...']);
        }
    }

    public function removeSessionData() {
        try{
            removeSession($this->device_id);
            $this->getQRData();
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('message', ['type' => 'error',  'message' => 'Error: ' . $e->getMessage()]);
        }
    }

    // public function waitTenSeconds()
    // {
    //     $this->removeSessionData();    
    // }

    public function render()
    {
        return view('livewire.user.scan-device');
    }
}
