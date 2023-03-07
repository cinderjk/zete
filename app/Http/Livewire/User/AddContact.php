<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Contact;
use App\Models\Tag;

class AddContact extends Component
{
    public $name, $phone, $tags = [], $stay = false;

    public function add()
    {
        $this->validate([
            'name' => 'required',
            'phone' => 'required|unique:contacts',
        ]);
        
        Contact::create([
            'name' => $this->name,
            'phone' => $this->phone,
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
        $tag_list = Tag::all();
        return view('livewire.user.add-contact', compact('tag_list'));
    }
}
