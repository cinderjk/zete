<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;

class Profile extends Component
{
    public $name;
    public $api_key;

    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->api_key = auth()->user()->api_key;    
    }

    public function regenerateApi()
    {
        auth()->user()->tokens()->delete();
        $token = auth()->user()->createToken(auth()->user()->name.'sallt'.now())->plainTextToken;
        auth()->user()->update([
            'api_key' => $token,
        ]);
        auth()->user()->save();
        $this->api_key = auth()->user()->api_key;
        return to_route('profile')->with('message', 'Api Key generated successfully');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
        ]);
        auth()->user()->update([
            'name' => $this->name,
        ]);

        return to_route('profile')->with('message', 'Profile updated successfully');
    }

    public function render()
    {
        return view('livewire.user.profile');
    }
}
