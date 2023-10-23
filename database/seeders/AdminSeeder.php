<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name'       => 'Eslam Salah',
            'email'      => 'eslamsalah20003000@gmail.com',
            'password'   => bcrypt('01110731636'),
        ]);
    }
}
