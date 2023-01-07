<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Device;
use App\Models\User;

class AddDevice extends Component
{
    public $name;
    public $description;
    public $legacy = 0;

    public function add()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'nullable',
            'legacy' => 'required',
        ]);
        if(User::find(auth()->user()->id)->max_devices <= Device::where('user_id',auth()->user()->id)->get()->count()){
            return to_route('device')->with('message', 'Maximum Devices Limit reached!');
        }
        $d = Device::create([
            'user_id' => auth()->user()->id,
            'name' => $this->name,
            'description' => $this->description,
            'status' => false,
            'legacy' => false,
        ]);

        return to_route('scan-device', ['id' => $d->id])->with('message', 'Scan your device now');
    }

    public function render()
    {
        return view('livewire.user.add-device');
    }
}
