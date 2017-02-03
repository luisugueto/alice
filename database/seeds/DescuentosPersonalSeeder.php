<?php

use Illuminate\Database\Seeder;

class DescuentosPersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('descuentos')->insert([

            'id_tipo_empleado' => 1,
            'descuento' => '1.00'
        ]);
        DB::table('descuentos')->insert([

            'id_tipo_empleado' => 2,
            'descuento' => '2.00'
        ]);
        DB::table('descuentos')->insert([

            'id_tipo_empleado' => 3,
            'descuento' => '3.00'
        ]);
    }
}
