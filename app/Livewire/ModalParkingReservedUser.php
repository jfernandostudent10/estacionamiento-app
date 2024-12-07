<?php

namespace App\Livewire;

use App\helpers\GlobalActionTrait;
use App\Models\ParkingReserved;
use App\Models\ParkingSite;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;

class ModalParkingReservedUser extends Component
{
    use GlobalActionTrait;

    public string $modalName, $modalTitle = 'Bloquear Estacionamiento';
    public $userCode, $userName;
    public array $vehicles = [];
    public $user_id, $vehicle_id;
    public ParkingSite $parkingSite;

    public function mount()
    {
        $this->modalName = 'form-' . uniqid();
        $this->parkingSite = new ParkingSite();
    }

    #[On('open-modal-parking-reserved-user')]
    public function open($idSite)
    {
        $this->reset(['userCode', 'userName', 'vehicles', 'user_id', 'vehicle_id', 'modalTitle']);
        $this->parkingSite = ParkingSite::with('parking_reserveds')->findOrFail($idSite);
        if ($this->parkingSite->status) {
            $this->modalTitle = 'Desbloquear Estacionamiento';
            $this->vehicles = $this->parkingSite->parking_reserveds->last()->user->getVehiclesSelectOptions();
            $info = $this->parkingSite->parking_reserveds->last();
            $this->userName = $info->user->name;
            $this->user_id = $info->user_id;
            $this->userCode = $info->user->email;
            $this->vehicle_id = $info->vehicle_id;
        }
        $this->globalShowModal($this->modalName);
    }

    public function searchUser()
    {
        $this->validate([
            'userCode' => 'required',
        ], [
            'userCode.required' => 'El código es requerido',
        ]);

        $email = $this->userCode . User::DOMAIN_UTP;

        $user = User::where('email', $email)
            ->with(['vehicles' => function ($query) {
                $query->where('is_approved', 1);
            }])
            ->first();

        if (!$user) {
            $this->addError('user_id', 'Usuario no encontrado');
            return;
        }

        if ($user->hasActiveParkingReserved()) {
            $this->addError('user_id', 'El usuario ya tiene un estacionamiento reservado');
            return;
        }

        $this->userName = $user->name;
        $this->user_id = $user->id;

        $this->vehicles = $user->getVehiclesSelectOptions();
        if (empty($this->vehicles)) {
            $this->addError('user_id', 'El usuario no tiene vehículos aprobados');
        }
    }

    public function lockSite()
    {
        $this->validate();
        $this->parkingSite->update(['status' => 1]);
        ParkingReserved::create([
            'user_id' => $this->user_id,
            'vehicle_id' => $this->vehicle_id,
            'parking_site_id' => $this->parkingSite->id,
            'start_time' => now(),
        ]);
        $this->globalHideModal($this->modalName);
        $this->dispatch('refresh-parking-reserved-user-list')->to(Home::class);
    }

    public function unlockSite()
    {
        $this->parkingSite->update(['status' => 0]);
        $this->parkingSite->parking_reserveds->last()->update(['end_time' => now()]);
        $this->globalHideModal($this->modalName);
        $this->dispatch('refresh-parking-reserved-user-list')->to(Home::class);
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'vehicle_id' => 'required|exists:vehicles,id',
        ];
    }

    public function render()
    {
        return view('livewire.modal-parking-reserved-user');
    }
}
