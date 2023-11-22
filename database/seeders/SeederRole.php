<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeederRole extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('roles')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        return \DB::table('roles')->insert([
            [
                "nombre_rol" => 'ADMINISTRADOR',
            ],
            [
                "nombre_rol" => 'COORDINADOR',
            ],
            [
                "nombre_rol" => 'TRADUCTOR',
            ],
            [
                "nombre_rol" => 'INTERPRETE',
            ],
            [
                "nombre_rol" => 'USUARIO',
            ],
        ]);
    }
}
