<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Device;

class EditDevice extends Component
{
    public $device_id, $name, $description, $legacy;

    public function mount($id)
    {
        $d = Device::where('user_id', auth()->user()->id)->where('id', $id)->first();
        if(!$d) {
            return to_route('device')->with('message', 'Device not found');
        }
        $this->device_id = $id;
        $this->name = $d->name;
        $this->description = $d->description;
        $this->legacy = $d->legacy;    
    }

    public function save()
    {
        $d = Device::where('user_id', auth()->user()->id)->where('id', $this->device_id)->first();
        if(!$d) {
            return to_route('device')->with('message', 'Device not found');
        }
        $this->validate([
            'name' => 'required',
            'description' => 'nullable',
            'legacy' => 'required',
        ]);
        $d->name = $this->name;
        $d->description = $this->description;
        $d->legacy = $this->legacy;
        $d->save();
        return to_route('device')->with('message', 'Device updated');    
    }

    public function render()
    {
        return view('livewire.user.edit-device');
    }
}
