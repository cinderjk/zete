<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class Logout extends Component
{
    public function logout()
    {
        $this->dispatchBrowserEvent('message', ['type' => 'success',  'message' => 'Logging out...']);
        auth()->logout();
        session()->flush();
        return to_route('login');
    }

    public function render()
    {
        return view('livewire.auth.logout');
    }
}
