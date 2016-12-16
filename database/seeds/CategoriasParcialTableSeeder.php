<?php

use Illuminate\Database\Seeder;

class CategoriasParcialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias_parcial')->insert([

            'categoria' => 'Deberes'
        ]);
        DB::table('categorias_parcial')->insert([

            'categoria' => 'Actividades Individuales'
        ]);
        DB::table('categorias_parcial')->insert([

            'categoria' => 'Actividades Grupales'
        ]);
        DB::table('categorias_parcial')->insert([

            'categoria' => 'Lecciones'
        ]);
        DB::table('categorias_parcial')->insert([

            'categoria' => 'Aporte'
        ]);
    }
}
