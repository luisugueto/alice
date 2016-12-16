<?php

use Illuminate\Database\Seeder;

class ComportamientoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comportamiento')->insert([

            'literal' => 'A',
            'descripcion' => 'Muy Satisfactorio'
        ]);
        DB::table('comportamiento')->insert([

            'literal' => 'B',
            'descripcion' => 'Satisfactorio'
        ]);
        DB::table('comportamiento')->insert([

            'literal' => 'C',
            'descripcion' => 'Poco Satisfactorio'
        ]);
        DB::table('comportamiento')->insert([

            'literal' => 'D',
            'descripcion' => 'Mejorable'
        ]);
        DB::table('comportamiento')->insert([

            'literal' => 'E',
            'descripcion' => 'Insatisfactorio'
        ]);
    }
}
