<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\MessageLog as MessageLogModel;
use Livewire\WithPagination;

class Message extends Component
{
    use WithPagination;
    protected $listeners = ['refresh' => '$refresh'];
    protected $paginationTheme = 'bootstrap';

    public function clearLog()
    {
        MessageLogModel::where('user_id', auth()->user()->id)->delete();
        $this->dispatchBrowserEvent('message', ['type' => 'success', 'message' => 'Message log cleared']);    
    }

    public function render()
    {
        $message_logs = MessageLogModel::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->paginate(5);
        return view('livewire.user.message', compact('message_logs'));
    }
}
