<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Contact;
use App\Models\Group;

class AddContact extends Component
{
    public $name, $phone, $group, $stay = false;

    public function add()
    {
        $this->validate([
            'name' => 'required',
            'phone' => 'required|unique:contacts',
            'group' => 'required',
        ]);
        
        Contact::create([
            'name' => $this->name,
            'phone' => $this->phone,
            'group_id' => $this->group,
        ]);

        if($this->stay){
            $this->reset();
            return $this->dispatchBrowserEvent('message', ['type' => 'success', 'message' => 'Contact added']);
        } else {
            return to_route('contact')->with('message', 'Contact added');
        }
    }

    public function render()
    {
        $groups = Group::all();
        return view('livewire.user.add-contact', compact('groups'));
    }
}
