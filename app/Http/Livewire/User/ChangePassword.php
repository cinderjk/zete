<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class ChangePassword extends Component
{
    public $current_password;
    public $password;
    public $password_confirmation;

    public function save()
    {
        $this->validate([
            'current_password' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);

        if(!auth()->user()->verifyPassword($this->current_password)){
            return $this->dispatchBrowserEvent('message', ['type' => 'danger',  'message' => 'Current password is incorrect!']);
        }

        auth()->user()->update([
            'password' => bcrypt($this->password),
        ]);
        $this->reset();
        return $this->dispatchBrowserEvent('message', ['type' => 'success',  'message' => 'Password updated successfully!']);
    }

    public function render()
    {
        return view('livewire.user.change-password');
    }
}
