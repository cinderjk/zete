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
        // dd('user');
        // // make session for redirect after login
        // session(['url.intended' => url()->previous()]);
        // // check if had just_reset_password session
        // if(session()->has('just_reset_password')) {
        //     // remove just_reset_password session
        //     session()->forget('just_reset_password');
        //     // remove previous url session
        //     session()->forget('url.intended');
        // }
        if (auth()->check()) {
            return redirect()->intended('/app/dashboard');
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
                return redirect()->intended('/app/dashboard');
            } else {
                return $this->addError('loginKey', __('These credentials do not match our records'));
            }
        } else {
            // if loginkey is email
            $attempt = auth()->attempt(['email' => $this->loginKey, 'password' => $this->password], $this->remember_me);
            if($attempt){
                // makelog('admin_login', auth()->user(), auth()->user()->id, 'Admin Login');
                return redirect()->to('/app/dashboard');
            }
        }
    }

    public function render()
    {
        return view('livewire.auth.login')->layout('layouts.auth');
    }
}
