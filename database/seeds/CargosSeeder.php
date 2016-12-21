<?php

use Illuminate\Database\Seeder;

class CargosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cargos')->insert([
        	'id_area' => 1,
            'nombre'=>'DIRECTOR(A)'
        ]);
        DB::table('cargos')->insert([
        	'id_area' => 1,
            'nombre'=>'COORDINADOR(A)'
        ]);
        DB::table('cargos')->insert([
        	'id_area' => 1,
            'nombre'=>'SECRETARIO(A)'
        ]);
        DB::table('cargos')->insert([
        	'id_area' => 4,
            'nombre'=>'DOCENTE DE PLANTA'
        ]);
        DB::table('cargos')->insert([
        	'id_area' => 4,
            'nombre'=>'DOCENTE ROTATIVO'
        ]);
        DB::table('cargos')->insert([
        	'id_area' => 5,
            'nombre'=>'DIRIGENTE DE CURSO'
        ]);
        DB::table('cargos')->insert([
        	'id_area' => 8,
            'nombre'=>'LIMPIEZA'
        ]);
        DB::table('cargos')->insert([
        	'id_area' => 8,
            'nombre'=>'MANTENIMIENTO'
        ]);
        DB::table('cargos')->insert([
        	'id_area' => 8,
            'nombre'=>'ELECTRICISTA'
        ]);
        DB::table('cargos')->insert([
        	'id_area' => 8,
            'nombre'=>'FONTANERO'
        ]);
        
    }
}
