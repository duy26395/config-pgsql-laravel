<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Price;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Price::create([
            'train_id' => 1,
            'type_id' => 1,
            'price' => 100,
        ]);

        Price::create([
            'train_id' => 1,
            'type_id' => 2,
            'price' => 200,
        ]);

        Price::create([
            'train_id' => 1,
            'type_id' => 3,
            'price' => 150,
        ]);

        Price::create([
            'train_id' => 2,
            'type_id' => 1,
            'price' => 150,
        ]);

        Price::create([
            'train_id' => 2,
            'type_id' => 2,
            'price' => 250,
        ]);

        Price::create([
            'train_id' => 2,
            'type_id' => 3,
            'price' => 170,
        ]);
    }
}
