<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeederIdioma extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('idiomas')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        return \DB::table('idiomas')->insert([
            [
                "nombre_idioma" => 'AYMARA',
                "tipo_idioma" => 'NATIVO',
                "imagen_idioma" => '1698033326.png'
            ],
            [
                "nombre_idioma" => 'INGLES',
                "tipo_idioma" => 'EXTRANJERO',
                "imagen_idioma" => '1698033365.jpg'
            ],
            [
                "nombre_idioma" => 'CASTELLANO',
                "tipo_idioma" => 'EXTRANJERO',
                "imagen_idioma" => '1698033399.jpg'
            ],
            [
                "nombre_idioma" => 'QUECHUA',
                "tipo_idioma" => 'NATIVO',
                "imagen_idioma" => '1698033422.png'
            ],
            [
                "nombre_idioma" => 'CHINO MANDARIN',
                "tipo_idioma" => 'EXTRANJERO',
                "imagen_idioma" => '1698033452.jpg'
            ],
            [
                "nombre_idioma" => 'PORTUGUES',
                "tipo_idioma" => 'EXTRANJERO',
                "imagen_idioma" => '1698033479.png'
            ],
            [
                "nombre_idioma" => 'FRANCES',
                "tipo_idioma" => 'EXTRANJERO',
                "imagen_idioma" => '1698033510.jpg'
            ],
            [
                "nombre_idioma" => 'ITALIANO',
                "tipo_idioma" => 'EXTRANJERO',
                "imagen_idioma" => '1698033543.png'
            ],
            [
                "nombre_idioma" => 'ALEMAN',
                "tipo_idioma" => 'EXTRANJERO',
                "imagen_idioma" => '1698033566.png'
            ],
            [
                "nombre_idioma" => 'GUARANI',
                "tipo_idioma" => 'NATIVO',
                "imagen_idioma" => '1698033628.png'
            ],
            [
                "nombre_idioma" => 'URU PUKINA',
                "tipo_idioma" => 'NATIVO',
                "imagen_idioma" => '1698033621.png'
            ],
            [
                "nombre_idioma" => 'RUSO',
                "tipo_idioma" => 'EXTRANJERO',
                "imagen_idioma" => '1698033613.png'
            ],
        ]);
    }
}
