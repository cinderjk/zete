<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Log;
use Livewire\Component;
use App\Models\User;
class Login extends Component
{
    // public $loginKey = 'admin@gmail.com';
    public $loginKey;
    public $password;
    public $remember_me = true;

    public function mount()
    {
        if (auth()->check()) {
            return redirect()->intended('/dashboard');
        }
    }

    public function updatedEmail()
    {
        $this->validate([
            'loginKey' => 'required',
        ]);
    }

    public function updatedPassword()
    {
        $this->validate([
            'password' => 'required',
        ]);
    }

    public function login()
    {
        $this->validate([
            'loginKey' => 'required',
            'password' => 'required',
        ]);

        // check what is loginkey (email, phone number or username)
        $check = filter_var($this->loginKey, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if($check == 'username') {
            // if loginkey is username
            $attempt = auth()->attempt(['username' => $this->loginKey, 'password' => $this->password], $this->remember_me);
            if($attempt) {
                return redirect()->intended('/dashboard');
            } else {
                return $this->dispatchBrowserEvent('message', ['type' => 'danger',  'message' => 'These credentials do not match our records']);
            }
        } else {
            // if loginkey is email
            $attempt = auth()->attempt(['email' => $this->loginKey, 'password' => $this->password], $this->remember_me);
            if($attempt){
                return redirect()->to('/dashboard');
            }
        }
    }

    public function render()
    {
        return view('livewire.auth.login')->layout('layouts.auth');
    }
}
