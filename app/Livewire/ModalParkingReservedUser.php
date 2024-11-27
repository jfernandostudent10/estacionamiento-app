<?php

namespace App\Livewire;

use App\helpers\GlobalActionTrait;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;

class ModalParkingReservedUser extends Component
{
    use GlobalActionTrait;

    public string $modalName, $modalTitle;
    public $userCode, $userName;

    public function mount()
    {
        $this->modalName = 'form-' . uniqid();
        $this->modalTitle = 'Bloquear Estacionamiento';
    }

    #[On('open-modal-parking-reserved-user')]
    public function open()
    {
        $this->globalShowModal($this->modalName);
    }

    public function searchUser()
    {
        $this->validate([
            'userCode' => 'required',
        ]);

        $email = $this->userCode . User::DOMAIN_UTP;
        $user = User::where('email', $email)->first();
        if ($user) {
            $this->userName = $user->name;
        } else {
            $this->userName = 'Usuario no encontrado';
        }
    }

    public function render()
    {
        return view('livewire.modal-parking-reserved-user');
    }
}
