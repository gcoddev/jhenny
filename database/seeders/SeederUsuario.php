<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeederUsuario extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        return \DB::table('users')->insert([
            [
                "ci" => '11111111',
                "expedido" => 'LP',
                "paterno" => 'Paterno',
                "materno" => 'Materno',
                "nombres" => 'Admin',
                "fecha_nacimiento" => '2001-12-01',
                "email" => 'admin@gmail.com',
                "estado_civil" => 'CASADO/A',
                "profesion" => 'DEV',
                "imagen_perfil" => '1698034737.png',
                "id_role" => 1,
                "username" => 'admin',
                "password" => bcrypt('admin'),
            ],
            [
                "ci" => '22222222',
                "expedido" => 'LP',
                "paterno" => 'Paterno',
                "materno" => 'Materno',
                "nombres" => 'Coordinador',
                "fecha_nacimiento" => '2001-12-01',
                "email" => 'coordinador@gmail.com',
                "estado_civil" => 'CASADO/A',
                "profesion" => 'Lic en Idiomas',
                "imagen_perfil" => '',
                "id_role" => 2,
                "username" => 'coordinador',
                "password" => bcrypt('coordinador'),
            ],
            [
                "ci" => '33333333',
                "expedido" => 'LP',
                "paterno" => 'Paterno',
                "materno" => 'Materno',
                "nombres" => 'Traductor',
                "fecha_nacimiento" => '2001-12-01',
                "email" => 'traductor@gmail.com',
                "estado_civil" => 'CASADO/A',
                "profesion" => 'Lic en Idiomas',
                "imagen_perfil" => '',
                "id_role" => 3,
                "username" => 'traductor',
                "password" => bcrypt('traductor'),
            ],
            [
                "ci" => '44444444',
                "expedido" => 'LP',
                "paterno" => 'Paterno',
                "materno" => 'Materno',
                "nombres" => 'Interprete',
                "fecha_nacimiento" => '2001-12-01',
                "email" => 'interprete@gmail.com',
                "estado_civil" => 'CASADO/A',
                "profesion" => 'Lic en Idiomas',
                "imagen_perfil" => '',
                "id_role" => 4,
                "username" => 'interprete',
                "password" => bcrypt('interprete'),
            ],
            [
                "ci" => '55555555',
                "expedido" => 'LP',
                "paterno" => 'Paterno',
                "materno" => 'Materno',
                "nombres" => 'Usuario',
                "fecha_nacimiento" => '2001-12-01',
                "email" => 'usuario@gmail.com',
                "estado_civil" => 'CASADO/A',
                "profesion" => 'Lic en Idiomas',
                "imagen_perfil" => '',
                "id_role" => 5,
                "username" => 'usuario',
                "password" => bcrypt('usuario1'),
            ],
        ]);
    }
}
