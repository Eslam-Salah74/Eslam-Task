<?php

namespace Database\Seeders;

use App\Models\Shipingrate;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shipingrate = Shipingrate::create([
            'country'          => 'Us',
            'rate'             => '2',
        ]);

        $shipingrate = Shipingrate::create([
            'country'          => 'UK',
            'rate'             => '3',
        ]);

        $shipingrate = Shipingrate::create([
            'country'          => 'CN',
            'rate'             => '3',
        ]);
    }
}
