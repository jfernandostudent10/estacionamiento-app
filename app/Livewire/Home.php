<?php

namespace App\Livewire;

use App\Models\ParkingSite;
use Carbon\Carbon;
use Livewire\Component;

class Home extends Component
{

    public function updateStatus($id)
    {
        $parkingSite = ParkingSite::find($id);
        $parkingSite->status = !$parkingSite->status;
        $parkingSite->save();
    }

    public function render()
    {
        $parkingSites = ParkingSite::wheredate('date', Carbon::now())->get();
        $availableParkingSites = $parkingSites->where('status', 0)->count();
        return view('livewire.home', compact('parkingSites', 'availableParkingSites'));
    }
}
