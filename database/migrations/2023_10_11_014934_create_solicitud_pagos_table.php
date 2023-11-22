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
        Schema::create('solicitud_pagos', function (Blueprint $table) {
            $table->id('id_solicitud_pagos');
            $table->unsignedBigInteger('id_solicitud')->nullable();
            $table->foreign('id_solicitud')->references('id_solicitud')->on('solicituds');
            $table->unsignedBigInteger('id_interpretacion')->nullable();
            $table->foreign('id_interpretacion')->references('id_interpretacion')->on('interpretacions');
            $table->unsignedBigInteger('id_pago')->nullable();
            $table->foreign('id_pago')->references('id_pago')->on('pagos');
            $table->string('comprobante_pago')->nullable();
            $table->enum('estado', ['PAGADO', 'PENDIENTE'])->default('PENDIENTE');
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
        Schema::dropIfExists('solicitud_pagos');
    }
};
