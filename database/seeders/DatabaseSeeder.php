<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RateSeeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\ProductSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(AdminSeeder::class);
        $this->call(RateSeeder::class);
        // $this->call(ProductSeeder::class);
    }
}
