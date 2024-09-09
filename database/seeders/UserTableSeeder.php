<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user')->insert([
            [
                'nombre' => 'Anette Castellanos',
                'rol' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Guadalupe Rabanales',
                'rol' => '2', 
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Judit Rabanales',
                'rol' => '1', 
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Aida Cifuentes',
                'rol' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Mariana Rabanales',
                'rol' => '2', 
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

    }
}
