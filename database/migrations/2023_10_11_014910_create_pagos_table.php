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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id('id_pago');
            $table->string('nombre_pago');
            $table->string('descripcion_pago');
            $table->enum('tipo_pago', ['EFECTIVO', 'DEPOSITO', 'TRANSFERENCIA']);
            $table->string('info_numero_pago')->nullable();
            $table->string('numero_pago')->nullable();
            $table->string('qr_imagen_pago')->nullable();
            $table->enum('estado_pago', ['ACTIVO', 'INACTIVO', 'ELIMINADO'])->default('ACTIVO');
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
        Schema::dropIfExists('pagos');
    }
};
