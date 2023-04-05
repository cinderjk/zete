<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Group as GroupModel;
use Livewire\WithPagination;
class Group extends Component
{
    use WithPagination;
    
    public $q = null;
    public $perPage = 5;
    protected $paginationTheme = 'bootstrap';

    public $listeners = [
        'refresh' => '$refresh',
        'clearSearch',
        'delete', 
    ];

    public function updatedQ()
    {
        $this->gotoPage(1);   
    }

    public function updatedPerpage()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        GroupModel::destroy($id);
        return $this->dispatchBrowserEvent('message', ['type' => 'success', 'message' => 'Contact deleted']);
    }

    public function render()
    {
        $groups = GroupModel::
                where('name', 'like', '%'.$this->q.'%')->
                paginate($this->perPage);
        return view('livewire.user.group', compact('groups'));
    }
}
