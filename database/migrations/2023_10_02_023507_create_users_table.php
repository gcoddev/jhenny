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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_role');
            $table->foreign('id_role')->references('id_role')->on('roles');
            $table->string('ci')->unique();
            $table->string('expedido');
            $table->string('paterno');
            $table->string('materno');
            $table->string('nombres');
            $table->date('fecha_nacimiento');
            $table->string('email');
            $table->integer('celular')->length(10);
            $table->string('estado_civil');
            $table->string('profesion');
            $table->string('imagen_perfil')->nullable();
            $table->string('username')->unique();
            $table->string('password');
            $table->enum('status', ['ACTIVO', 'INACTIVO', 'ELIMINADO'])->default('ACTIVO');
            $table->rememberToken();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
