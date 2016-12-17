<?php

use Illuminate\Database\Seeder;

class PeriodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $valor = 2014;

        for($i = 0; $i < 30; $i++)
        {
            if($i == 2){
                DB::table('periodos')->insert([
                    'nombre' => $valor+$i,
                    'status' => 'activo'
                ]); 
            }else{
                DB::table('periodos')->insert([
                    'nombre' => $valor+$i,
                    'status' => 'inactivo'
                ]); 
            }
        }
    }
}
