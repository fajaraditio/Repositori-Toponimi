<?php

namespace App\Console\Commands;

use App\Support\AreaSupport;
use Illuminate\Console\Command;

class RetrieveAreas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'area:retrieve';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieve areas of Indonesia with api.cahyadsn.com';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(AreaSupport $areaSupport)
    {
        $areaSupport->retrieve();
        
        return Command::SUCCESS;
    }
}
