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
        Schema::connection('pgsql_proyectos_schema')->create('historico_proyectos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('public.users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('proyecto_id');
            $table->foreign('proyecto_id')->references('id')->on('proyectos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('accion');
            $table->string('motivo');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql_proyectos_schema')->dropIfExists('historico_proyectos');
    }
};
