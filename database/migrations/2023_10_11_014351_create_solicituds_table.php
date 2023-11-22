<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicituds', function (Blueprint $table) {
            $table->id('id_solicitud');
            $table->unsignedBigInteger('id');
            $table->foreign('id')->references('id')->on('users');
            $table->unsignedBigInteger('id_asignado')->nullable();
            $table->foreign('id_asignado')->references('id')->on('users');
            $table->unsignedBigInteger('id_idioma');
            $table->foreign('id_idioma')->references('id_idioma')->on('idiomas');
            $table->string('codigo_solicitud')->unique()->nullable();
            $table->string('titulo_solicitud');
            $table->text('descripcion_solicitud');
            $table->string('documento_solicitud');
            $table->string('documento_solicitud_fin')->nullable();
            $table->text('descripcion_solicitud_fin')->nullable();
            $table->enum('estado_solicitud', ['ACTIVO', 'INACTIVO', 'ELIMINADO', 'ENTREGADO', 'CANCELADO'])->default('ACTIVO');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicituds');
    }
};
