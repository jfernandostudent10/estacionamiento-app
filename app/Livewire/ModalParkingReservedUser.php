<?php

namespace App\Livewire;

use App\helpers\GlobalActionTrait;
use Livewire\Component;
use Livewire\Attributes\On;

class ModalParkingReservedUser extends Component
{
    use GlobalActionTrait;

    public string $modalName, $modalTitle;

    public function mount()
    {
        $this->modalName = 'form-' . uniqid();
        $this->modalTitle = __('lang.name');
    }

    #[On('open-modal-parking-reserved-user')]
    public function open()
    {
        $this->globalShowModal($this->modalName);
    }

    public function render()
    {
        return view('livewire.modal-parking-reserved-user');
    }
}
