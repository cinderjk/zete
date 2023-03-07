<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Contact as ContactModel;
use Livewire\WithPagination;
class Contact extends Component
{
    use WithPagination;
    public $q;
    public $perPage = 10;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        if($this->q){
            $contacts = ContactModel::where('name', 'like', '%'.$this->q.'%')
                ->orWhere('phone', 'like', '%'.$this->q.'%')
                ->paginate($this->perPage);
        }else{
            $contacts = ContactModel::paginate($this->perPage);
        }
        return view('livewire.user.contact', compact('contacts'));
    }
}
