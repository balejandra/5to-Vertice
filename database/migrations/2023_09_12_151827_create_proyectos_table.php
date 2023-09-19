<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::connection('pgsql_proyectos_schema')->create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->string('nro_planilla');
            $table->foreignId('institucion_id')->constrained('public.instituciones')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('nombre_proyecto')->required();
            $table->string('tiempo_ejecucion')->required();
            $table->string('ano_ejecucion')->required(); // Puede ser un rango, como "2022-2023"
            $table->text('metas_ano_actual')->required();
            $table->text('informacion_interes')->nullable();
            
            $table->string('jefe_proyecto')->required();

            $table->foreignId('origen_id')->constrained('taxonomia.origenes')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreignId('funcion_id')->constrained('taxonomia.funciones')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreignId('tipo_investigacion_id')->constrained('taxonomia.tipos_investigacion')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreignId('participacion_id')->constrained('taxonomia.participaciones')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreignId('cadencia_investigativa_id')->constrained('taxonomia.cadencias_investigativas')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreignId('tipo_desarrollo_id')->constrained('taxonomia.tipos_desarrollo')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreignId('fin_investigacion_id')->constrained('taxonomia.fines_investigacion')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreignId('tipo_actividad_id')->constrained('taxonomia.tipos_actividad')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreignId('linea_investigacion_id')->constrained('taxonomia.lineas_investigacion')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->decimal('porcentaje_ejecucion_fisica', 5, 2)->nullable();
            $table->decimal('costo_total_proyecto', 20, 2)->required();
            $table->decimal('costo_transnacional', 20, 2)->nullable();
            $table->decimal('ahorro_nacion', 20, 2)->nullable();
            $table->string('victoria_temprana')->nullable();
            $table->string('nudo_critico')->nullable();
            $table->string('persona_contacto')->required();
            
            $table->foreignId('user_id')->constrained('public.users')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreignId('estatus_id')->constrained('taxonomia.estatus')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql_proyectos_schema')->dropIfExists('proyectos');
    }
};
