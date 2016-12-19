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
            'id_cargo'=>'1',
            'clave'=>'1234',
            'ingreso_notas'=>'1',
            'id_tipo'=>'1' 
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
    }
}