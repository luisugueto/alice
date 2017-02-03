<?php

use Illuminate\Database\Seeder;

class CantidadDescuento extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
       DB::table('cantidad_descuento')->insert([
            'id_tipoempleado' => 1,
            'cantidad' => 0.6
        ]);

       DB::table('cantidad_descuento')->insert([
            'id_tipoempleado' => 2,
            'cantidad' => 0.7
        ]);

       DB::table('cantidad_descuento')->insert([
            'id_tipoempleado' => 2,
            'cantidad' => 0.8
        ]);
        
    }
}
