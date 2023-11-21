<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            \Database\Seeders\TypeSeeder::class,
            \Database\Seeders\TrainSeeder::class,
            \Database\Seeders\PriceSeeder::class,
            \Database\Seeders\CouponSeeder::class,
        ]);
    }
}
