<?php

use Illuminate\Database\Seeder;

class TipoEmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   
    public function run()
    {
        DB::table('tipo_empleado')->insert([
            'tipo_empleado' => 'Administrativo'
        ]);
        DB::table('tipo_empleado')->insert([
            'tipo_empleado' => 'Docente de Planta'
        ]);
        DB::table('tipo_empleado')->insert([
            'tipo_empleado' => 'Docente Rotativo'
        ]);
        DB::table('tipo_empleado')->insert([
            'tipo_empleado' => 'Obrero'
        ]);
        
    }
}
