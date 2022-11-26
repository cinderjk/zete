<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Device as DeviceModel;

class Device extends Component
{
    public function render()
    {
        $devices = DeviceModel::where('user_id', auth()->user()->id)->get();
        return view('livewire.user.device', compact('devices'));
    }
}
