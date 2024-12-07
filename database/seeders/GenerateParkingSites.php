<?php

namespace Database\Seeders;

use App\Models\ParkingSite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenerateParkingSites extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= ParkingSite::MAX_PARKING_SITES; $i++) {
            ParkingSite::create([
                'number' => $i,
                'status' => 0
            ]);
        }
    }
}
