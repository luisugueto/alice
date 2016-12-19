<?php

use Illuminate\Database\Seeder;

class DiasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dias')->insert(['dia' => 'LUNES']);
        DB::table('dias')->insert(['dia' => 'MARTES']);
        DB::table('dias')->insert(['dia' => 'MIÉRCOLES']);
        DB::table('dias')->insert(['dia' => 'JUEVES']); 
        DB::table('dias')->insert(['dia' => 'VIERNES']);
    }
}
