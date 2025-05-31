<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CricketerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample data for cricketers
        $cricketers = [
            [
                'name' => 'Cricketer 1',
                'innings' => 50,
                'run_rate' => 6.75,
                'matches_played' => 30,
                'other_details' => 'Some other details for Cricketer 1',
            ],
            [
                'name' => 'Cricketer 2',
                'innings' => 45,
                'run_rate' => 7.20,
                'matches_played' => 25,
                'other_details' => 'Some other details for Cricketer 2',
            ],
            // Add more cricketers here...
        ];

        // Insert the seed data into the cricketers table
        foreach ($cricketers as $cricketer) {
            DB::table('cricketers')->insert($cricketer);
        }
    }
}
