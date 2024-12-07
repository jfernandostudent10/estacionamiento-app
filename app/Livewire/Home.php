<?php

namespace App\Livewire;

use App\Models\ParkingSite;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;

class Home extends Component
{

    public function updateStatus($id)
    {
        $this->dispatch('open-modal-parking-reserved-user', idSite: $id)->to(ModalParkingReservedUser::class);
    }

    #[On('refresh-parking-reserved-user-list')]
    public function render()
    {
        $parkingSites = ParkingSite::all();
        $availableParkingSites = $parkingSites->where('status', 0)->count();
        return view('livewire.home', compact('parkingSites', 'availableParkingSites'));
    }
}
