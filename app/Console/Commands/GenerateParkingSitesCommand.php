<?php

namespace App\Console\Commands;

use App\Models\ParkingSite;
use Illuminate\Console\Command;

class GenerateParkingSitesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-parking-sites-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        ParkingSite::generateParkingSites();
    }
}
