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

    public string $modalName, $modalTitle;
    public $userCode, $userName;
    public array $vehicles = [];
    public $user_id, $vehicle_id;
    public ParkingSite $parkingSite;

    public function mount()
    {
        $this->modalName = 'form-' . uniqid();
        $this->modalTitle = 'Bloquear Estacionamiento';
    }

    #[On('open-modal-parking-reserved-user')]
    public function open($idSite)
    {
        $this->reset(['userCode', 'userName', 'vehicles', 'user_id', 'vehicle_id']);
        $this->parkingSite = ParkingSite::findOrFail($idSite);
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
            $user->load('vehicles');
            $this->user_id = $user->id;
            $this->vehicles = $user->vehicles->mapWithKeys(function ($vehicule) {
                return [$vehicule->id => $vehicule->vehicle_type . ' - ' . $vehicule->plate];
            })->toArray();
        } else {
            $this->addError('user_id', 'Usuario no encontrado');
        }
    }

    public function store()
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
