<?php

use Illuminate\Database\Seeder;

class NomenclaturasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nomenclaturas')->insert([

            'nombre' => 'Procedimientos y Prácticas',
            'literal' => 'P',
            'puntaje' => '8',
            'descripcion' => '2 puntos: Preparación y Calidad de Trabajo, 6 puntos: Desarrollo'
        ]);
        DB::table('nomenclaturas')->insert([

            'nombre' => 'Identidad Institucional',
            'literal' => 'I',
            'puntaje' => '2',
            'descripcion' => '0.5 puntos: Presentación, 0.5 puntos: Caligrafía, 0.5  puntos: Ortografía, 0.5 puntos: Materiales'
        ]);
        DB::table('nomenclaturas')->insert([

            'nombre' => 'Actitudes y Valores',
            'literal' => 'A',
            'puntaje' => '2',
            'descripcion' => 'Responsabilidad, Puntualidad, Honestidad, etc.'
        ]);
        DB::table('nomenclaturas')->insert([

            'nombre' => 'Contenido Teórico',
            'literal' => 'C',
            'puntaje' => '6',
            'descripcion' => 'Controles y Exámenes de Evaluaciones Escritas (pruebas)'
        ]);
        DB::table('nomenclaturas')->insert([

            'nombre' => 'Memorias (Trabajos Presentados)',
            'literal' => 'M',
            'puntaje' => '2',
            'descripcion' => 'Resolución de Cuestionarios y Trabajos Presentados de la Actividad'
        ]);
    }
}
