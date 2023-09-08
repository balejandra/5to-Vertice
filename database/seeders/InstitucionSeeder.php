<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstitucionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $instituciones = [
            ['nombre' => 'FUVIDIT', 'sigla' => 'FVT', 'sector_id' => 1], // Terrestre
            ['nombre' => 'SAVA', 'sigla' => 'SAVA', 'sector_id' => 1], // Terrestre
            ['nombre' => 'SITSSA', 'sigla' => 'SITSS', 'sector_id' => 1], // Terrestre
            ['nombre' => 'CORPOLOGISTICA', 'sigla' => 'CLGS', 'sector_id' => 1], // Terrestre
            ['nombre' => 'FONTUR', 'sigla' => 'FNTR', 'sector_id' => 1], // Terrestre
            ['nombre' => 'INTT', 'sigla' => 'INTT', 'sector_id' => 1], // Terrestre
            ['nombre' => 'TRANZOATEGUI', 'sigla' => 'TZOAE', 'sector_id' => 1], // Terrestre
            ['nombre' => 'TRANSTACHIRA', 'sigla' => 'TTCHA', 'sector_id' => 1], // Terrestre
            ['nombre' => 'PLANTA YUTONG', 'sigla' => 'PY', 'sector_id' => 1], // Terrestre
        
            ['nombre' => 'AEROPOSTAL', 'sigla' => 'AP', 'sector_id' => 2], // Aéreo
            ['nombre' => 'CONVIASA', 'sigla' => 'CVIASA', 'sector_id' => 2], // Aéreo
            ['nombre' => 'INAC', 'sigla' => 'INAC', 'sector_id' => 2], // Aéreo
            ['nombre' => 'IAIM', 'sigla' => 'IAIM', 'sector_id' => 2], // Aéreo
            ['nombre' => 'EANSA', 'sigla' => 'EANSA', 'sector_id' => 2], // Aéreo
        
            ['nombre' => 'DIANCA', 'sigla' => 'DINCA', 'sector_id' => 3], // Acuático
            ['nombre' => 'VENAVEGA', 'sigla' => 'VVG', 'sector_id' => 3], // Acuático
            ['nombre' => 'BOLIPUERTOS', 'sigla' => 'BPTOS', 'sector_id' => 3], // Acuático
            ['nombre' => 'INC', 'sigla' => 'INC', 'sector_id' => 3], // Acuático
            ['nombre' => 'INEA', 'sigla' => 'INEA', 'sector_id' => 3], // Acuático
            ['nombre' => 'CONFERRY', 'sigla' => 'CONFY', 'sector_id' => 3], // Acuático
        
            ['nombre' => 'INFERCA', 'sigla' => 'INFCA', 'sector_id' => 4], // Ferroviario
            ['nombre' => 'METRO DE CARACAS', 'sigla' => 'MCCS', 'sector_id' => 4], // Ferroviario
            ['nombre' => 'IFE', 'sigla' => 'IFE', 'sector_id' => 4], // Ferroviario
            ['nombre' => 'METRO LOS TEQUES', 'sigla' => 'MLTQS', 'sector_id' => 4], // Ferroviario
            ['nombre' => 'METRO VALENCIA', 'sigla' => 'MVLC', 'sector_id' => 4], // Ferroviario
            ['nombre' => 'METRO DE MARACAIBO', 'sigla' => 'MMCBO', 'sector_id' => 4], // Ferroviario
            ['nombre' => 'TROMERCA', 'sigla' => 'TMC', 'sector_id' => 4], // Ferroviario
            ['nombre' => 'FERROLASA', 'sigla' => 'FRSA', 'sector_id' => 4], // Ferroviario
            ['nombre' => 'FERROVEN', 'sigla' => 'FRV', 'sector_id' => 4], // Ferroviario
        
            ['nombre' => 'INST PRUEBAS', 'sigla' => 'TEST', 'sector_id' => 1], // Terrestre
        ];
        
        DB::table('instituciones')->insert($instituciones);
    }
}
