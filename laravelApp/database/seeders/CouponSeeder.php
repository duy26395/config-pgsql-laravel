<?php

namespace Database\Seeders;
use App\Models\Coupon;

use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Coupon::create([
            'name' => 'SV',
            'coupon' => 10,
        ]);

        Coupon::create([
            'name' => 'CT',
            'coupon' => 20,
        ]);

        Coupon::create([
            'name' => 'TE',
            'coupon' => 50,
        ]);

        Coupon::create([
            'name' => 'other',
            'coupon' => 0,
        ]);
    }
}
