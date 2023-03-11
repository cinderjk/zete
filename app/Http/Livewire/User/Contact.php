<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Contact as ContactModel;
use App\Models\Group;
use Livewire\WithPagination;
class Contact extends Component
{
    use WithPagination;
    public $q = null;
    public $g = null;
    public $perPage = 5;
    public $selected = [];
    protected $paginationTheme = 'bootstrap';

    public $listeners = [
        'refresh' => '$refresh',
        'clearSearch',
        'delete', 
        'bulkSelect',
        'selectVisible', 
        'selectAll', 
        'deselectAll',
        'selectItem',
        'deselectItem'
    ];

    public function updatedQ()
    {
        $this->gotoPage(1);   
        $this->deselectAll();
        $this->dispatchBrowserEvent('uncheckSelectAll');
    }

    public function updatedG()
    {
        $this->gotoPage(1); 
        $this->deselectAll();
        $this->dispatchBrowserEvent('uncheckSelectAll');
    }

    public function updatedPerpage()
    {
        $this->resetPage();
        $this->deselectAll();
        $this->dispatchBrowserEvent('uncheckSelectAll');
    }

    public function delete($id)
    {
        ContactModel::destroy($id);
        return $this->dispatchBrowserEvent('message', ['type' => 'success', 'message' => 'Contact deleted']);
    }

    public function bulkSelect($array)
    {
        $this->selected = $array;
        return $this->dispatchBrowserEvent('message', ['type' => 'success', 'message' => 'Contact selected']);
    }

    public function selectVisible($ids)
    {
        $this->selected = array_merge($this->selected, $ids);
        return $this->dispatchBrowserEvent('message', ['type' => 'success', 'message' => 'All visible contact selected']);    
    }

    public function selectAll()
    {
        $this->selected = ContactModel::pluck('id')->toArray();
        $this->dispatchBrowserEvent('checkSelectAll');
        return $this->dispatchBrowserEvent('message', ['type' => 'success', 'message' => 'All contact selected']);
    }

    public function deselectAll()
    {
        $this->selected = [];
    }

    public function selectItem($id)
    {
        $this->selected[] = $id;
    }

    public function deselectItem($id)
    {
        $key = array_search($id, $this->selected);
        unset($this->selectedInput[$key]);
    }

    public function deleteSelected()
    {
        ContactModel::whereIn('id', $this->selected)->delete();
        $this->selected = [];
        $this->dispatchBrowserEvent('uncheckSelectAll');
        return $this->dispatchBrowserEvent('message', ['type' => 'success', 'message' => 'Contact deleted']);
    }

    public function render()
    {
        if($this->q && $this->g){
            $contacts = ContactModel::
                where('group_id', $this->g)->
                where('name', 'like', '%'.$this->q.'%')->
                orWhere('phone', 'like', '%'.$this->q.'%')->
                with('group')->
                paginate($this->perPage);
        } elseif($this->q && !$this->g){
            $contacts = ContactModel::
            where('name', 'like', '%'.$this->q.'%')->
            orWhere('phone', 'like', '%'.$this->q.'%')->
            with('group')->
            paginate($this->perPage);
        } elseif(!$this->q && $this->g){
            $contacts = ContactModel::
            where('group_id', $this->g)->
            with('group')->
            paginate($this->perPage);
        } else{
            $contacts = ContactModel::paginate($this->perPage);
        }
        $groups = Group::all();
        return view('livewire.user.contact', compact('contacts', 'groups'));
    }
}
