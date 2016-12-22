<?php

use Illuminate\Database\Seeder;

class EstudiantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('datos_representantes')->insert([
            'nombres_re'=>'Maria Perez',
            'cedula_re'=>'N-1234567890',
            'parentesco'=>'Madre',
            'nacionalidad_re' => 'N',
            'telefono_re'=>'12345456677',
            'direccion_re'=>'Aqui',
            'vive_con'=>'Padre y hermanos'
        ]);
        DB::table('datos_generales_estudiante')->insert([
            'id_representante' => '1',
            'codigo_matricula' => 'abc123',
            'apellido_paterno' => 'Quimotes',
            'apellido_materno' =>'Perez',
            'nombres'=>'Julian Jose',
            'cedula'=>'12345678912',
            'fecha_nacimiento'=>'2001-01-01',
            'fecha_registro'=>'2016-01-09',
            'genero'=>'M',
            'estado_actual'=>'Activo',
            'tipo_registro'=>'pre-inscripcion',
            'direccion'=>'allá',
            'nacionalidad'=>'N',
            'provincia'=>'Azogues',
            'ciudad_natal'=>'Azogues',
            'telefono'=>'68263826832683',
            'correo'=>'julianquimotes@gmail.com'
        ]);

        DB::table('datos_medicos')->insert([
            'id_estudiante'=>'1',
            'grupo_sanguineo' => 'ORH+',
            'peso'=>'30kg',
            'altura'=>'1.20cm',
            'capacidad_especial'=>'Ninguna',
            'porcentaje_discapacidad' => '0',
            'medicinas_contraindicadas'=>'Ninguna',
            'alergico_a'=>'Nada',
            'patologia'=>'Ninguna'
        ]);
        DB::table('datos_padres')->insert([
            'nombres_pa'=>'Maria Perez',
            'cedula_pa'=>'N-1234567890',
            'foto_pa'=>'',
            'lugar_trabajo'=>'en CADA, esquina',
            'direccion_pa'=>'por allí',
            'telefono_pa'=>'12345456677',
            'correo_pa'=>'mariap@gmail.com',
            'nacionalidad_pa'=>'N',
            'nivel_educacion'=>'Profesional'
        ]);
        	//------------------------------------------------------
        	DB::table('datos_representantes')->insert([
            'nombres_re'=>'Petra Jimenez',
            'cedula_re'=>'E-1284347890',
            'parentesco'=>'Madre',
            'nacionalidad_re' => 'N',
            'telefono_re'=>'12345456677',
            'direccion_re'=>'Aqui',
            'vive_con'=>'Padre y hermanos'
        ]);
        DB::table('datos_generales_estudiante')->insert([
            'id_representante'=>'2',
            'codigo_matricula' => 'abc124',
            'apellido_paterno'=>'Quimotes',
            'apellido_materno'=>'Jimenez',
            'nombres'=>'Maria Juliana',
            'cedula'=>'12345678990',
            'fecha_nacimiento'=>'2001-01-01',
            'fecha_registro'=>'2016-01-09',
            'genero'=>'F',
            'estado_actual'=>'Activo',
            'tipo_registro'=>'pre-inscripcion',
            'direccion'=>'allá',
            'nacionalidad'=>'N',
            'provincia'=>'Azogues',
            'ciudad_natal'=>'Azogues',
            'telefono'=>'68263826832683',
            'correo'=>'mariajuliana@gmail.com'
        ]);

        DB::table('datos_medicos')->insert([
            'id_estudiante'=>'2',
            'grupo_sanguineo' => 'ORH+',
            'peso'=>'30kg',
            'altura'=>'1.20cm',
            'capacidad_especial'=>'Ninguna',
            'porcentaje_discapacidad' => '0',
            'medicinas_contraindicadas'=>'Ninguna',
            'alergico_a'=>'Nada',
            'patologia'=>'Ninguna'
        ]);
        DB::table('datos_padres')->insert([
            'nombres_pa'=>'Petra Jimenez',
            'cedula_pa'=> 'N-1284347890',
            'foto_pa'=>'',
            'lugar_trabajo'=>'en CADA, esquina',
            'direccion_pa'=>'por allí',
            'telefono_pa'=>'12345456677',
            'correo_pa'=>'petraap@gmail.com',
            'nacionalidad_pa'=>'N',
            'nivel_educacion'=>'Profesional'
        ]);

        //----------------------------------

    }
}
