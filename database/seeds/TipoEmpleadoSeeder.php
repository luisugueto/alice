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
            'tipo_empleado' => 'ADMINISTRATIVO'
        ]);
        DB::table('tipo_empleado')->insert([
            'tipo_empleado' => 'DOCENTE'
        ]);
        DB::table('tipo_empleado')->insert([
            'tipo_empleado' => 'OBRERO'
        ]);
        
    }
}
