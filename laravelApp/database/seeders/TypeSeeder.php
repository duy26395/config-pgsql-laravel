<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Type::create([
            'code' => 'L1',
            'name' => 'Soft seat',
        ]);

        Type::create([
            'code' => 'L2',
            'name' => 'Bed on 1st floor',
        ]);

        Type::create([
            'code' => 'L3',
            'name' => 'Bed on 2rd floor',
        ]);
    }
}
