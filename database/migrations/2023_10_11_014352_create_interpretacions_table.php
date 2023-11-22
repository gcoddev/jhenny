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
        Schema::create('interpretacions', function (Blueprint $table) {
            $table->id('id_interpretacion');
            $table->unsignedBigInteger('id');
            $table->foreign('id')->references('id')->on('users');
            $table->unsignedBigInteger('id_asignado')->nullable();
            $table->foreign('id_asignado')->references('id')->on('users');
            $table->unsignedBigInteger('id_idioma');
            $table->foreign('id_idioma')->references('id_idioma')->on('idiomas');
            // $table->string('codigo_interpretacion')->unique()->nullable();
            $table->string('titulo_interpretacion');
            $table->text('descripcion_interpretacion');
            $table->enum('estado_interpretacion', ['ACTIVO', 'INACTIVO', 'ELIMINADO', 'INTERPRETADO', 'CANCELADO'])->default('ACTIVO');
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
        Schema::dropIfExists('interpretacions');
    }
};
