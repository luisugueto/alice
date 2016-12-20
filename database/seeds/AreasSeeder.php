<?php

use Illuminate\Database\Seeder;

class AreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('area_trabajos')->insert([
            'nombre' => 'DACE'
        ]);
        DB::table('area_trabajos')->insert([
            'nombre' => 'RRHH'
        ]);
        DB::table('area_trabajos')->insert([
            'nombre' => 'AUDIO VISUAL'
        ]);
        DB::table('area_trabajos')->insert([
            'nombre' => 'ACADÉMICA'
        ]);
        DB::table('area_trabajos')->insert([
            'nombre' => 'CONSERJERÍA ESTUDIANTIL'
        ]);
        DB::table('area_trabajos')->insert([
            'nombre' => 'DEPORTE'
        ]);
        DB::table('area_trabajos')->insert([
            'nombre' => 'CULTURA Y RECREACIÓN'
        ]);
        DB::table('area_trabajos')->insert([
            'nombre' => 'SERVICIO Y MANTENIMIENTO'
        ]);

    }
}
