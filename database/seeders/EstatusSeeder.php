<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('taxonomia.estatus')->insert([
            [
                'id'=>1,
                'nombre'=>'Iniciado',
                'created_at'=>now()
            ],
            [
                'id'=>2,
                'nombre'=>'Revisado',
                'created_at'=>now()
            ],
            [
                'id'=>3,
                'nombre'=>'Aprobado',
                'created_at'=>now()
            ],
            [
                'id'=>4,
                'nombre'=>'Rechazado',
                'created_at'=>now()
            ],
            [
                'id'=>5,
                'nombre'=>'Aprobado Final',
                'created_at'=>now()
            ],
            [
                'id'=>6,
                'nombre'=>'Actualizado',
                'created_at'=>now()
            ],
            [
                'id'=>7,
                'nombre'=>'Anulado',
                'created_at'=>now()
            ],
            [
                'id'=>8,
                'nombre'=>'Cerrado',
                'created_at'=>now()
            ],
        ]);
    }
}
