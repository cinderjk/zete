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

    protected $listeners = ['checkSession', 'getQRData'];

    public function mount($id)
    {
        $d = Device::where('id', $id)->first();
        if(!$d) {
            return to_route('device')->with('message', 'Device not found');
        }
        $this->device_id = $id;
        $this->legacy = $d->legacy;
        $this->status = $d->status;
        // dd($this->status);
        if($this->status === 0){
            $this->checkSession();
            $this->text = 'Loading...';
        } else{
            $this->text = 'Device is authenticated';
        }
    }

    public function getQRData()
    {
        if(Cache::has('device_id_qr_'.$this->device_id)) {
            $checkTime = Cache::get('time_device_id_qr_'.$this->device_id) > time();
            if($checkTime) {
                $this->text = 'Time left: '.(Cache::get('time_device_id_qr_'.$this->device_id) - time());
                return $this->qr_data = Cache::get('device_id_qr_'.$this->device_id);
            }
        }
        removeSession($this->device_id);
        $add = addSession($this->device_id, $this->legacy);
        if($add->success == false) {
            $this->show_refresh = true;
            return $this->text = "Please try again 20 seconds later";
        }
        $this->qr_data = $add->data->qr;
        Cache::put('time_device_id_qr_'.$this->device_id, now()->timestamp, 20);
        return Cache::put('device_id_qr_'.$this->device_id, $this->qr_data, 20);
    }

    public function checkSession()
    {
        $check = sessionStatus($this->device_id);
        if($check->status == "AUTHENTICATED") {
            if(!is_null($check->data->status) && $check->data->status == 'authenticated') {
                Device::where('id', $this->device_id)->update([
                    'status' => 1
                ]);
                sleep(3);
                return to_route('device')->with('message', 'Device has been authenticated');
            }
            return;
        } else {
            Device::where('id', $this->device_id)->update([
                'status' => 0
            ]);
            $this->status = 0;
            $this->text = 'Device is not connected';
            return;
        }
    }

    public function render()
    {
        return view('livewire.user.scan-device');
    }
}
