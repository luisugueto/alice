<?php

use Illuminate\Database\Seeder;

class PersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('datos_generales_personal')->insert([
            'codigo_pesonal'=>'12421412',
            'apellido_paterno'=>'UGUETO',
            'apellido_materno'=>'ESCOBAR',
            'nombres'=>'LUIS',
            'cedula'=>'24388425',
            'fecha_nacimiento'=>'1995-08-04',
            'fecha_ingreso'=>'2010-01-01',
            'edad'=>'21',
            'edo_civil'=>'casado',
            'genero'=>'M',
            'estado_actual'=>'Activo',
            'tipo_registro'=>'1',
            'especialidad'=>'INFORMÁTICA',
            'direccion'=>'asfasfas',
            'telefono'=>'04160408205',
            'correo'=>'lui_su_gueto@hotmail.com',
            'clave'=> bcrypt('1234'),
            'ingreso_notas'=>'1',
            'id_cargo'=>'4' 
        ]);
        DB::table('users')->insert([

            'name' => 'LUIS ESCOBAR',
            'email' => 'lui_su_gueto@hotmail.com',
            'password' => bcrypt('1234'),
            'roles_id' => '3'
        ]);

        DB::table('remuneracion')->insert([
            'id_personal'=>'1',
            'sueldo_mens'=>'1000',
            'descuento_iess'=>'100.00',
            'bono_responsabilidad'=>'500',
            'horas_extras'=>'Y',
            'cuenta_bancaria'=>'71264876124',
            'devolver_fondos'=>'N'
        ]);

        DB::table('informacion_academica')->insert([
            'id_personal'=>'1',
            'primaria'=>'asfaf',
            'secundaria'=>'asfasfas',
            'superior'=>'asfasfasfas',
            'titulo'=>'asfasfas',
            'cursos'=>'asfasfas',
            'historial_laboral'=>'asfasfas'
        ]);

        //------------------------------------------
        DB::table('datos_generales_personal')->insert([
            'codigo_pesonal'=>'123456',
            'apellido_paterno'=>'CAMPOS',
            'nombres'=>'ORIONED',
            'cedula'=>'17082188',
            'fecha_nacimiento'=>'1990-05-09',
            'fecha_ingreso'=>'2010-01-01',
            'edad'=>'32',
            'edo_civil'=>'soltero',
            'genero'=>'M',
            'estado_actual'=>'Activo',
            'tipo_registro'=>'1',
            'especialidad'=>'INFORMÁTICA',
            'direccion'=>'aqui',
            'telefono'=>'04262343358',
            'correo'=>'en4pami@gmail.com',
            'clave'=> bcrypt('1234'),
            'ingreso_notas'=>'1',
            'id_cargo'=>'5' 
        ]);
         DB::table('users')->insert([

            'name' => 'ORIONED CAMPOS',
            'email' => 'en4pami@gmail.com',
            'password' => bcrypt('1234'),
            'roles_id' => '3'
        ]);

        DB::table('remuneracion')->insert([
            'id_personal'=>'2',
            'sueldo_mens'=>'1000',
            'descuento_iess'=>'100.00',
            'bono_responsabilidad'=>'500',
            'horas_extras'=>'Y',
            'cuenta_bancaria'=>'7129964876124',
            'devolver_fondos'=>'N'
        ]);

        DB::table('informacion_academica')->insert([
            'id_personal'=>'2',
            'primaria'=>'asfaf',
            'secundaria'=>'asfasfas',
            'superior'=>'asfasfasfas',
            'titulo'=>'asfasfas',
            'cursos'=>'asfasfas',
            'historial_laboral'=>'asfasfas'
        ]);
    }
}
