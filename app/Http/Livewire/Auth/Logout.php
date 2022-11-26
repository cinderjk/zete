<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class Logout extends Component
{
    public function logout()
    {
        $this->dispatchBrowserEvent('message', ['message' => 'Sedang keluar...', 'style' => 'success']); // trigger toastr
        auth()->logout();
        session()->flush();
        return to_route('login');
    }

    public function render()
    {
        return view('livewire.auth.logout');
    }
}
