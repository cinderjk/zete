<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Device;

class Dashboard extends Component
{
    public function render()
    {
        $device = auth()->user()->devices;
        $devices = $device->count();
        $connected_devices = $device->where('status', 1)->count();
        $disconnected_devices = $device->where('status', 0)->count();

        return view('livewire.user.dashboard', compact('devices', 'connected_devices', 'disconnected_devices'));
    }
}
