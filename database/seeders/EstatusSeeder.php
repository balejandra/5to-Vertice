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
                'nombre'=>'Aprobado',
                'created_at'=>now()
            ],
            [
                'id'=>2,
                'nombre'=>'Rechazado',
                'created_at'=>now()
            ],
            [
                'id'=>3,
                'nombre'=>'Pendiente',
                'created_at'=>now()
            ],
            [
                'id'=>4,
                'nombre'=>'Cerrado',
                'created_at'=>now()
            ],
            [
                'id'=>5,
                'nombre'=>'Anulado',
                'created_at'=>now()
            ],
            [
                'id'=>6,
                'nombre'=>'Pendiente Aprobación',
                'created_at'=>now()
            ],
            [
                'id'=>7,
                'nombre'=>'Actualización',
                'created_at'=>now()
            ],
        ]);
    }
}
