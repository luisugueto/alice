<?php

use Illuminate\Database\Seeder;

class AsignaturasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asignaturas')->insert([

            'asignatura' => 'Relación Lógica Matemática',
            'codigo' => 'RLM-EI',
            'id_curso' => '1'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Comprensión Oral Escrita',
            'codigo' => 'COE-EI',
            'id_curso' => '1'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Desarrollo Personal y Social',
            'codigo' => 'DPS-EI',
            'id_curso' => '1'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Comprensión Personal Artística',
            'codigo' => 'CPA-EI',
            'id_curso' => '1'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Expresión Corporal',
            'codigo' => 'EC-EI',
            'id_curso' => '1'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Identidad y Autonomía del Desarrollo',
            'codigo' => 'IAD-EI',
            'id_curso' => '1'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Inglés',
            'codigo' => 'I-EIO',
            'id_curso' => '1'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Computación',
            'codigo' => 'C-EIO',
            'id_curso' => '1'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Formación Cristiana',
            'codigo' => 'FC-EIO',
            'id_curso' => '1'
        ]);
        //--------------------- 1 er grado----------------------
        DB::table('asignaturas')->insert([

            'asignatura' => 'Relación Lógica Matemática',
            'codigo' => 'RLM-1',
            'id_curso' => '2'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Comprensión Oral Escrita',
            'codigo' => 'COE-1',
            'id_curso' => '2'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Desarrollo Personal y Social',
            'codigo' => 'DPS-1',
            'id_curso' => '2'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Comprensión Personal Artística',
            'codigo' => 'CPA-1',
            'id_curso' => '2'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Expresión Corporal',
            'codigo' => 'EC-1',
            'id_curso' => '2'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Identidad y Autonomía del Desarrollo',
            'codigo' => 'IAD-1',
            'id_curso' => '2'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Inglés',
            'codigo' => 'I-1O',
            'id_curso' => '2'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Computación',
            'codigo' => 'C-1O',
            'id_curso' => '2'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Formación Cristiana',
            'codigo' => 'FC-1O',
            'id_curso' => '2'
        ]);
        //------------------ 2 do grado----------------
        DB::table('asignaturas')->insert([

            'asignatura' => 'Matemática',
            'codigo' => 'M-2',
            'id_curso' => '3'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Lenguaje y Literatura',
            'codigo' => 'LL-2',
            'id_curso' => '3'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Entorno Natural y Social',
            'codigo' => 'ENS-2',
            'id_curso' => '3'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación Estética',
            'codigo' => 'EE-2',
            'id_curso' => '3'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación Física',
            'codigo' => 'EF-2',
            'id_curso' => '3'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Inglés',
            'codigo' => 'I-2O',
            'id_curso' => '3'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Computación',
            'codigo' => 'C-2O',
            'id_curso' => '3'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Formación Cristiana',
            'codigo' => 'FC-2O',
            'id_curso' => '3'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Valores Humanos',
            'codigo' => 'VH-2O',
            'id_curso' => '3'
        ]);
        //----------------- 3 er grado -----------------------
        DB::table('asignaturas')->insert([

            'asignatura' => 'Matemática',
            'codigo' => 'M-3',
            'id_curso' => '4'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Lenguaje y Literatura',
            'codigo' => 'LL-3',
            'id_curso' => '4'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Entorno Natural y Social',
            'codigo' => 'ENS-3',
            'id_curso' => '4'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación Estética',
            'codigo' => 'EE-3',
            'id_curso' => '4'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación Física',
            'codigo' => 'EF-3',
            'id_curso' => '4'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Inglés',
            'codigo' => 'I-3O',
            'id_curso' => '4'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Computación',
            'codigo' => 'C-3O',
            'id_curso' => '4'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Formación Cristiana',
            'codigo' => 'FC-3O',
            'id_curso' => '4'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Valores Humanos',
            'codigo' => 'VH-3O',
            'id_curso' => '4'
        ]);
        //----------------------- 4 to grado --------------------------
        DB::table('asignaturas')->insert([

            'asignatura' => 'Matemática',
            'codigo' => 'M-4',
            'id_curso' => '5'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Lenguaje y Literatura',
            'codigo' => 'LL-4',
            'id_curso' => '5'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Ciencias Naturales',
            'codigo' => 'CN-4',
            'id_curso' => '5'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Ciencias Sociales',
            'codigo' => 'CS-4',
            'id_curso' => '5'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación Estética',
            'codigo' => 'EE-4',
            'id_curso' => '5'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación Física',
            'codigo' => 'EF-4',
            'id_curso' => '5'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Inglés',
            'codigo' => 'I-4O',
            'id_curso' => '5'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Computación',
            'codigo' => 'C-4O',
            'id_curso' => '5'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Formación Cristiana',
            'codigo' => 'FC-4O',
            'id_curso' => '5'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Valores Humanos',
            'codigo' => 'VH-4O',
            'id_curso' => '5'
        ]);
        //--------------------- 5 to grado --------------------------
        DB::table('asignaturas')->insert([

            'asignatura' => 'Matemática',
            'codigo' => 'M-5',
            'id_curso' => '6'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Lenguaje y Literatura',
            'codigo' => 'LL-5',
            'id_curso' => '6'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Ciencias Naturales',
            'codigo' => 'CN-5',
            'id_curso' => '6'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Ciencias Sociales',
            'codigo' => 'CS-5',
            'id_curso' => '6'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación Estética',
            'codigo' => 'EE-5',
            'id_curso' => '6'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación Física',
            'codigo' => 'EF-5',
            'id_curso' => '6'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Inglés',
            'codigo' => 'I-5O',
            'id_curso' => '6'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Computación',
            'codigo' => 'C-5O',
            'id_curso' => '6'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Formación Cristiana',
            'codigo' => 'FC-5O',
            'id_curso' => '6'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Valores Humanos',
            'codigo' => 'VH-5O',
            'id_curso' => '6'
        ]);
        //-------------------- 6 to grado --------------------------
        DB::table('asignaturas')->insert([

            'asignatura' => 'Matemática',
            'codigo' => 'M-6',
            'id_curso' => '7'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Lenguaje y Literatura',
            'codigo' => 'LL-6',
            'id_curso' => '7'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Ciencias Naturales',
            'codigo' => 'CN-6',
            'id_curso' => '7'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Ciencias Sociales',
            'codigo' => 'CS-6',
            'id_curso' => '7'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación Estética',
            'codigo' => 'EE-6',
            'id_curso' => '7'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación Física',
            'codigo' => 'EF-6',
            'id_curso' => '7'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Inglés',
            'codigo' => 'I-6O',
            'id_curso' => '7'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Computación',
            'codigo' => 'C-6O',
            'id_curso' => '7'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Formación Cristiana',
            'codigo' => 'FC-6O',
            'id_curso' => '7'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Valores Humanos',
            'codigo' => 'VH-6O',
            'id_curso' => '7'
        ]);
        //---------------- 7 mo grado ---------------------------
        DB::table('asignaturas')->insert([

            'asignatura' => 'Matemática',
            'codigo' => 'M-7',
            'id_curso' => '8'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Lenguaje y Literatura',
            'codigo' => 'LL-7',
            'id_curso' => '8'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Ciencias Naturales',
            'codigo' => 'CN-7',
            'id_curso' => '8'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Ciencias Sociales',
            'codigo' => 'CS-7',
            'id_curso' => '8'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación Estética',
            'codigo' => 'EE-7',
            'id_curso' => '8'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación Física',
            'codigo' => 'EF-7',
            'id_curso' => '8'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Inglés',
            'codigo' => 'I-7O',
            'id_curso' => '8'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Computación',
            'codigo' => 'C-7O',
            'id_curso' => '8'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Formación Cristiana',
            'codigo' => 'FC-7O',
            'id_curso' => '8'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Valores Humanos',
            'codigo' => 'VH-7O',
            'id_curso' => '8'
        ]);
    }
}
