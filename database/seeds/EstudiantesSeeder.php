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
            'cedula_re'=>'N-1134567350',
            'parentesco'=>'Madre',
            'nacionalidad_re' => 'N',
            'telefono_re'=>'12345456677',
            'direccion_re'=>'Aqui',
            'vive_con'=>'Padre y hermanos'
        ]);
        DB::table('datos_generales_estudiante')->insert([
            'id_representante' => '1',
            'codigo_matricula' => 'abc2131315',
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

        for($i = 2; $i <= 14; $i++){

        	DB::table('datos_representantes')->insert([
            'nombres_re'=>'Petra Jimenez',
            'cedula_re'=>'E-1282347879'.$i,
            'parentesco'=>'Madre',
            'nacionalidad_re' => 'N',
            'telefono_re'=>'12345456677',
            'direccion_re'=>'Aqui',
            'vive_con'=>'Padre y hermanos'
        ]);
        DB::table('datos_generales_estudiante')->insert([
            'id_representante'=>'2',
            'codigo_matricula' => 'abc124'.$i,
            'apellido_paterno'=>'Quimotes',
            'apellido_materno'=>'Jimenez',
            'nombres'=>'Maria Juliana',
            'cedula'=>'12245628990'.$i,
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
            'correo'=>'mariajulianaa@gmail.com'.$i
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
            'cedula_pa'=> 'E-1284347890'.$i,
            'foto_pa'=>'',
            'lugar_trabajo'=>'en CADA, esquina',
            'direccion_pa'=>'por allí',
            'telefono_pa'=>'12345456677',
            'correo_pa'=>'petrraap@gmail.com'.$i,
            'nacionalidad_pa'=>'N',
            'nivel_educacion'=>'Profesional'
        ]);

        DB::table('datos_representantes')->insert([
            'nombres_re'=>'Petra Jimenez',
            'cedula_re'=>'N-1284337890'.$i,
            'parentesco'=>'Madre',
            'nacionalidad_re' => 'N',
            'telefono_re'=>'12345456677'.$i,
            'direccion_re'=>'Aqui',
            'vive_con'=>'Padre y hermanos'
        ]);
                DB::table('datos_generales_estudiante')->insert([
                    'id_representante'=> $i,
                    'codigo_matricula' => 'abc13a4'.$i,
                    'apellido_paterno'=>'Quimotes'.$i,
                    'apellido_materno'=>'Jimenez'.$i,
                    'nombres'=>'Maria Juliana'.$i,
                    'cedula'=>'12345678990'.$i,
                    'fecha_nacimiento'=>'2001-01-01',
                    'fecha_registro'=>'2016-01-09',
                    'genero'=>'F',
                    'estado_actual'=>'Activo',
                    'tipo_registro'=>'pre-inscripcion',
                    'direccion'=>'allá',
                    'nacionalidad'=>'N',
                    'provincia'=>'Azogues',
                    'ciudad_natal'=>'Azogues',
                    'telefono'=>'68263826832683'.$i,
                    'correo'=>'mariajuliana@gmail.com'.$i
                ]);

                DB::table('datos_medicos')->insert([
                    'id_estudiante' => $i,
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
                    'cedula_pa'=>'N-123456689'.$i,
                    'foto_pa'=>'',
                    'lugar_trabajo'=>'en CADA, esquina',
                    'direccion_pa'=>'por allí',
                    'telefono_pa'=>'12345456677',
                    'correo_pa'=>'petraap@gmail.com'.$i,
                    'nacionalidad_pa'=>'N',
                    'nivel_educacion'=>'Profesional'
                ]);
        }

        //----------------------------------

    }
}
