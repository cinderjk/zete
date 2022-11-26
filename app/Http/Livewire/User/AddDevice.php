<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Device;

class AddDevice extends Component
{
    public $name;
    public $description;

    public function create()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        
        Device::create([
            'user_id' => auth()->user()->id,
            'name' => $this->name,
            'description' => $this->description,
            'status' => false,
        ]);
    }

    public function render()
    {
        return view('livewire.user.add-device');
    }
}
