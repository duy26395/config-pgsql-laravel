<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Train;

class TrainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Train::create([
            'name' => 'SE1',
            'time_start' => '08:30:00',
        ]);

        Train::create([
            'name' => 'SE2',
            'time_start' => '12:00:00',
        ]);
    }
}
