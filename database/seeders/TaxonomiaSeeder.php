<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaxonomiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $origen = [
            ['nombre' => 'Sistema Educativo (Red Universitaria)', 'created_at' => now()],
            ['nombre' => 'Sistema de Innovación Tecnológica (FUDIVIT)', 'created_at' => now()],
            ['nombre' => 'Investigaciones del Proceso Social del Trabajo "Taller Adentro"', 'created_at' => now()],
        ];

        $funciones=[
            ['nombre' => 'Medio Fijo', 'created_at' => now()],
            ['nombre' => 'Medio Móvil', 'created_at' => now()],
            ['nombre' => 'Sistema de Control', 'created_at' => now()],
        ];

        $linea_investigacion = [
            ['nombre' => 'Medio Fijo', 'created_at' => now()],
            ['nombre' => 'Medio Móvil', 'created_at' => now()],
            ['nombre' => 'Sistema de Control', 'created_at' => now()],
        ];

        $tipoInvestigacion = [
            ['nombre' => 'Académica', 'created_at' => now()],
            ['nombre' => 'Aplicada', 'created_at' => now()],
            ['nombre' => 'Socio-Productiva', 'created_at' => now()],
        ];

        $participacion = [
            ['nombre' => 'MPPT', 'created_at' => now()],
            ['nombre' => 'Pública', 'created_at' => now()],
            ['nombre' => 'Privada', 'created_at' => now()],
            ['nombre' => 'Mixta', 'created_at' => now()],
        ];

        $cadenciaInvestigativa = [
            ['nombre' => 'Respuesta Inmediata', 'created_at' => now()],
            ['nombre' => 'Mediano Plazo', 'created_at' => now()],
            ['nombre' => 'Largo Plazo', 'created_at' => now()],
        ];

        $tipoDesarrollo = [
            ['nombre' => 'Ingeniería Inversa', 'created_at' => now()],
            ['nombre' => 'Reingeniería', 'created_at' => now()],
            ['nombre' => 'Investigación Científica', 'created_at' => now()],
            ['nombre' => 'Innovación Tecnológica', 'created_at' => now()],
        ];

        $finInvestigacion = [
            ['nombre' => 'Mantenimiento', 'created_at' => now()],
            ['nombre' => 'Reparación', 'created_at' => now()],
            ['nombre' => 'Sustitución', 'created_at' => now()],
            ['nombre' => 'Construcción', 'created_at' => now()],
            ['nombre' => 'Innovación', 'created_at' => now()],
            ['nombre' => 'Generación de Conocimiento', 'created_at' => now()],
        ];

        $tipoActividad = [
            ['nombre' => 'Investigación y Desarrollo', 'created_at' => now()],
            ['nombre' => 'Educativa', 'created_at' => now()],
            ['nombre' => 'Transferencia Tecnológica', 'created_at' => now()],
            ['nombre' => 'Desarrollo', 'created_at' => now()],
        ];

        DB::table('taxonomia.origenes')->insert($origen);
        DB::table('taxonomia.funciones')->insert($funciones);
        DB::table('taxonomia.lineas_investigacion')->insert($linea_investigacion);
        DB::table('taxonomia.tipos_investigacion')->insert($tipoInvestigacion);
        DB::table('taxonomia.participaciones')->insert($participacion);
        DB::table('taxonomia.cadencias_investigativas')->insert($cadenciaInvestigativa);
        DB::table('taxonomia.tipos_desarrollo')->insert($tipoDesarrollo);
        DB::table('taxonomia.fines_investigacion')->insert($finInvestigacion);
        DB::table('taxonomia.tipos_actividad')->insert($tipoActividad);

    }
}