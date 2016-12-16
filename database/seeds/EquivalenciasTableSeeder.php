<?php

use Illuminate\Database\Seeder;

class EquivalenciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('equivalencias')->insert([

            'minimo' => '9.00',
            'maximo' => '10.00',
            'literales' => 'DAR',
            'descripcion' => 'Domina el Aprendizaje Requerido'
        ]);
        DB::table('equivalencias')->insert([

            'minimo' => '7.00',
            'maximo' => '8.99',
            'literales' => 'AAR',
            'descripcion' => 'Alcanza el Aprendizaje Requerido'
        ]);
        DB::table('equivalencias')->insert([

            'minimo' => '4.01',
            'maximo' => '6.99',
            'literales' => 'PAAR',
            'descripcion' => 'Próximo al Aprendizaje Requerido'
        ]);
        DB::table('equivalencias')->insert([

            'minimo' => '1.00',
            'maximo' => '4.00',
            'literales' => 'NAAR',
            'descripcion' => 'No Alcanza el Aprendizaje Requerido'
        ]);
    }
}
