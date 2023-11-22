<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeederPago extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('pagos')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        return \DB::table('pagos')->insert([
            [
                "nombre_pago" => 'Pago por oficina',
                "descripcion_pago" => 'Dirigirse a la oficina de traducion de Idiomas',
                "tipo_pago" => 'EFECTIVO',
                "info_numero_pago" => "",
                "numero_pago" => "",
                "qr_imagen_pago" => "",
            ],
            [
                "nombre_pago" => 'Deposito bancario',
                "descripcion_pago" => 'Deposito por Banco union',
                "tipo_pago" => 'DEPOSITO',
                "info_numero_pago" => "Nombres Paterno Materno CI: 11111111",
                "numero_pago" => "100000000000000000",
                "qr_imagen_pago" => "",
            ],
            [
                "nombre_pago" => 'Pago QR',
                "descripcion_pago" => 'Transferencia bancaria por QR',
                "tipo_pago" => 'TRANSFERENCIA',
                "info_numero_pago" => "",
                "numero_pago" => "",
                "qr_imagen_pago" => "1698033726.png",
            ],
        ]);
    }
}
