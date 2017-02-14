<?php

use Illuminate\Database\Seeder;

class DescontarMensualidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           DB::table('descontar_mensualidads')->insert([
            'nombre' => 'Descuento',
            'cantidad' => 2
        ]);
    }
}
