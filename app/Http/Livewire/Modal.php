<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Modal extends Component
{
    public $open = false;

    public $actionView = ''; //default
    
    public $action = '';

    protected $listeners = [
        'open' => 'open',
        'close' => 'close',
        'create' => 'create',
        'edit' => 'edit',
        'delete' => 'delete',
        // 'confirmDel' => 'confirmDel',
    ];

    protected $sessionLog = true;

    public function mount()
    {
        Session::forget('msg');
        $this->sessionLog && Session::push('msg', 'Modal mount');
    }

    public function open()
    {
        $this->open = true;
        $this->sessionLog && Session::push('msg', 'Modal open');
        $this->dispatchBrowserEvent('openModal', Session::get('msg'));
    }

    public function close()
    {
        $this->open = false;
        $this->sessionLog && Session::push('msg', 'Modal close');
        $this->dispatchBrowserEvent('closeModal', Session::get('msg'));
        $this->resetAction();
        Session::forget('msg');
    }

    public function resetAction()
    {
        $this->action = '';
        $this->sessionLog && Session::push('msg', 'Modal resetAction');
    }
}
