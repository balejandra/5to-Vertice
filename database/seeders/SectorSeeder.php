<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sectores')->insert([
            [
                'id' => 1,
                'nombre' => 'Terrestre',
                'created_at' => now()
            ],
            [
                'id' => 2,
                'nombre' => 'Aéreo',
                'created_at' => now()
            ],
            [
                'id' => 3,
                'nombre' => 'Acuático',
                'created_at' => now()
            ],
            [
                'id' => 4,
                'nombre' => 'Ferroviario',
                'created_at' => now()
            ],
        ]);
    }
}