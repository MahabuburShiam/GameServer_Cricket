<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Cricketer;

class InsertCricketersData extends Command
{
    protected $signature = 'app:insert-cricketers-data';
    protected $description = 'Insert data into the cricketers table';
    public function handle()
    {
        $data = [
            ['name' => 'Player 1', 'innings' => 10, 'run_rate' => 6.75, 'matches_played' => 20, 'other_details' => 'Other details 1'],
            ['name' => 'Player 2', 'innings' => 15, 'run_rate' => 7.25, 'matches_played' => 25, 'other_details' => 'Other details 2'],
           
        ];

        Cricketer::insert($data);

        $this->info('Data inserted into the cricketers table successfully.');
    }
}
