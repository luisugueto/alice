<?php

use Illuminate\Database\Seeder;

class RubrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//---------- rubros de educacion inicial
        DB::table('rubros')->insert([
            'nombre'=>'PENSION ENERO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-02-05',
            'id_curso' => '1',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION FEBRERO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-03-05',
            'id_curso' => '1',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION MARZO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-04-05',
            'id_curso' => '1',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION ABRIL(2016)',
            'monto'=>'35',
            'fecha'=>'2016-05-05',
            'id_curso' => '1',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION MAYO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-06-05',
            'id_curso' => '1',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION JUNIO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-07-05',
            'id_curso' => '1',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION JULIO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-08-05',
            'id_curso' => '1',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION AGOSTO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-09-05',
            'id_curso' => '1',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION SEPTIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-10-05',
            'id_curso' => '1',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION OCTUBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-11-05',
            'id_curso' => '1',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION NOVIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-12-05',
            'id_curso' => '1',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION DICIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-12-15',
            'id_curso' => '1',
            'id_periodo'=>'3'
        ]);

        DB::table('rubros')->insert([
            'nombre'=>'MATRICULA INICIAL',
            'monto'=>'35',
            'fecha'=>'2016-01-25',
            'id_curso' => '1',
            'id_periodo'=>'3'
        ]);

        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR ENERO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-01-15',
            'id_curso' => '1',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR FEBRERO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-02-15',
            'id_curso' => '1',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR MARZO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-03-15',
            'id_curso' => '1',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR ABRIL(2016)',
            'monto'=>'35',
            'fecha'=>'2016-04-15',
            'id_curso' => '1',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR MAYO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-05-15',
            'id_curso' => '1',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR JUNIO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-06-15',
            'id_curso' => '1',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR JULIO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-07-15',
            'id_curso' => '1',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR ESCOLAR AGOSTO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-08-15',
            'id_curso' => '1',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR SEPTIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-09-15',
            'id_curso' => '1',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR OCTUBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-10-15',
            'id_curso' => '1',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR NOVIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-11-15',
            'id_curso' => '1',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR DICIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-12-05',
            'id_curso' => '1',
            'id_periodo'=>'3'
        ]);

        //------------------------------rubros de 1 er grado-------------------------------
        
        DB::table('rubros')->insert([
            'nombre'=>'PENSION ENERO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-02-05',
            'id_curso' => '2',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION FEBRERO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-03-05',
            'id_curso' => '2',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION MARZO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-04-05',
            'id_curso' => '2',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION ABRIL(2016)',
            'monto'=>'35',
            'fecha'=>'2016-05-05',
            'id_curso' => '2',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION MAYO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-06-05',
            'id_curso' => '2',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION JUNIO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-07-05',
            'id_curso' => '2',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION JULIO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-08-05',
            'id_curso' => '2',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION AGOSTO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-09-05',
            'id_curso' => '2',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION SEPTIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-10-05',
            'id_curso' => '2',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION OCTUBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-11-05',
            'id_curso' => '2',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION NOVIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-12-05',
            'id_curso' => '2',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION DICIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-12-15',
            'id_curso' => '2',
            'id_periodo'=>'3'
        ]);

        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR ENERO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-01-15',
            'id_curso' => '2',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR FEBRERO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-02-15',
            'id_curso' => '2',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR MARZO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-03-15',
            'id_curso' => '2',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR ABRIL(2016)',
            'monto'=>'35',
            'fecha'=>'2016-04-15',
            'id_curso' => '2',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR MAYO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-05-15',
            'id_curso' => '2',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR JUNIO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-06-15',
            'id_curso' => '2',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR JULIO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-07-15',
            'id_curso' => '2',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR ESCOLAR AGOSTO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-08-15',
            'id_curso' => '2',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR SEPTIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-09-15',
            'id_curso' => '2',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR OCTUBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-10-15',
            'id_curso' => '2',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR NOVIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-11-15',
            'id_curso' => '2',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR DICIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-12-05',
            'id_curso' => '2',
            'id_periodo'=>'3'
        ]);

        //------------------------------rubros de 2 er grado-------------------------------
        
        DB::table('rubros')->insert([
            'nombre'=>'PENSION ENERO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-02-05',
            'id_curso' => '3',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION FEBRERO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-03-05',
            'id_curso' => '3',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION MARZO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-04-05',
            'id_curso' => '3',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION ABRIL(2016)',
            'monto'=>'35',
            'fecha'=>'2016-05-05',
            'id_curso' => '2',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION MAYO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-06-05',
            'id_curso' => '3',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION JUNIO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-07-05',
            'id_curso' => '3',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION JULIO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-08-05',
            'id_curso' => '3',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION AGOSTO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-09-05',
            'id_curso' => '3',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION SEPTIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-10-05',
            'id_curso' => '3',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION OCTUBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-11-05',
            'id_curso' => '3',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION NOVIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-12-05',
            'id_curso' => '3',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION DICIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-12-15',
            'id_curso' => '3',
            'id_periodo'=>'3'
        ]);

        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR ENERO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-01-15',
            'id_curso' => '3',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR FEBRERO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-02-15',
            'id_curso' => '3',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR MARZO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-03-15',
            'id_curso' => '3',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR ABRIL(2016)',
            'monto'=>'35',
            'fecha'=>'2016-04-15',
            'id_curso' => '3',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR MAYO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-05-15',
            'id_curso' => '3',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR JUNIO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-06-15',
            'id_curso' => '3',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR JULIO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-07-15',
            'id_curso' => '3',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR ESCOLAR AGOSTO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-08-15',
            'id_curso' => '3',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR SEPTIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-09-15',
            'id_curso' => '3',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR OCTUBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-10-15',
            'id_curso' => '3',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR NOVIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-11-15',
            'id_curso' => '3',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR DICIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-12-05',
            'id_curso' => '3',
            'id_periodo'=>'3'
        ]);

        //------------------------------rubros de 3 er grado-------------------------------
        
        DB::table('rubros')->insert([
            'nombre'=>'PENSION ENERO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-02-05',
            'id_curso' => '4',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION FEBRERO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-03-05',
            'id_curso' => '4',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION MARZO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-04-05',
            'id_curso' => '4',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION ABRIL(2016)',
            'monto'=>'35',
            'fecha'=>'2016-05-05',
            'id_curso' => '4',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION MAYO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-06-05',
            'id_curso' => '4',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION JUNIO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-07-05',
            'id_curso' => '4',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION JULIO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-08-05',
            'id_curso' => '4',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION AGOSTO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-09-05',
            'id_curso' => '4',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION SEPTIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-10-05',
            'id_curso' => '4',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION OCTUBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-11-05',
            'id_curso' => '4',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION NOVIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-12-05',
            'id_curso' => '4',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION DICIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-12-15',
            'id_curso' => '4',
            'id_periodo'=>'3'
        ]);

        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR ENERO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-01-15',
            'id_curso' => '4',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR FEBRERO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-02-15',
            'id_curso' => '4',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR MARZO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-03-15',
            'id_curso' => '4',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR ABRIL(2016)',
            'monto'=>'35',
            'fecha'=>'2016-04-15',
            'id_curso' => '4',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR MAYO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-05-15',
            'id_curso' => '4',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR JUNIO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-06-15',
            'id_curso' => '4',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR JULIO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-07-15',
            'id_curso' => '4',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR ESCOLAR AGOSTO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-08-15',
            'id_curso' => '4',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR SEPTIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-09-15',
            'id_curso' => '4',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR OCTUBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-10-15',
            'id_curso' => '4',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR NOVIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-11-15',
            'id_curso' => '4',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR DICIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-12-05',
            'id_curso' => '4',
            'id_periodo'=>'3'
        ]);

        //------------------------------rubros de 4 to grado-------------------------------
        
        DB::table('rubros')->insert([
            'nombre'=>'PENSION ENERO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-02-05',
            'id_curso' => '5',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION FEBRERO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-03-05',
            'id_curso' => '5',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION MARZO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-04-05',
            'id_curso' => '5',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION ABRIL(2016)',
            'monto'=>'35',
            'fecha'=>'2016-05-05',
            'id_curso' => '5',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION MAYO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-06-05',
            'id_curso' => '5',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION JUNIO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-07-05',
            'id_curso' => '5',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION JULIO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-08-05',
            'id_curso' => '5',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION AGOSTO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-09-05',
            'id_curso' => '5',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION SEPTIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-10-05',
            'id_curso' => '5',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION OCTUBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-11-05',
            'id_curso' => '5',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION NOVIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-12-05',
            'id_curso' => '5',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION DICIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-12-15',
            'id_curso' => '5',
            'id_periodo'=>'3'
        ]);

        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR ENERO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-01-15',
            'id_curso' => '5',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR FEBRERO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-02-15',
            'id_curso' => '5',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR MARZO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-03-15',
            'id_curso' => '5',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR ABRIL(2016)',
            'monto'=>'35',
            'fecha'=>'2016-04-15',
            'id_curso' => '5',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR MAYO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-05-15',
            'id_curso' => '5',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR JUNIO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-06-15',
            'id_curso' => '2',
            'id_periodo'=>'5'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR JULIO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-07-15',
            'id_curso' => '5',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR ESCOLAR AGOSTO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-08-15',
            'id_curso' => '5',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR SEPTIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-09-15',
            'id_curso' => '5',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR OCTUBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-10-15',
            'id_curso' => '5',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR NOVIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-11-15',
            'id_curso' => '5',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR DICIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-12-05',
            'id_curso' => '5',
            'id_periodo'=>'3'
        ]);

        //------------------------------rubros de 5 er grado-------------------------------
        
        DB::table('rubros')->insert([
            'nombre'=>'PENSION ENERO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-02-05',
            'id_curso' => '6',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION FEBRERO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-03-05',
            'id_curso' => '6',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION MARZO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-04-05',
            'id_curso' => '6',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION ABRIL(2016)',
            'monto'=>'35',
            'fecha'=>'2016-05-05',
            'id_curso' => '6',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION MAYO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-06-05',
            'id_curso' => '6',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION JUNIO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-07-05',
            'id_curso' => '6',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION JULIO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-08-05',
            'id_curso' => '6',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION AGOSTO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-09-05',
            'id_curso' => '6',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION SEPTIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-10-05',
            'id_curso' => '6',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION OCTUBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-11-05',
            'id_curso' => '6',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION NOVIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-12-05',
            'id_curso' => '6',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION DICIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-12-15',
            'id_curso' => '6',
            'id_periodo'=>'3'
        ]);

        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR ENERO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-01-15',
            'id_curso' => '6',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR FEBRERO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-02-15',
            'id_curso' => '6',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR MARZO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-03-15',
            'id_curso' => '6',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR ABRIL(2016)',
            'monto'=>'35',
            'fecha'=>'2016-04-15',
            'id_curso' => '6',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR MAYO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-05-15',
            'id_curso' => '6',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR JUNIO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-06-15',
            'id_curso' => '6',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR JULIO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-07-15',
            'id_curso' => '6',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR ESCOLAR AGOSTO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-08-15',
            'id_curso' => '6',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR SEPTIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-09-15',
            'id_curso' => '6',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR OCTUBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-10-15',
            'id_curso' => '6',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR NOVIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-11-15',
            'id_curso' => '6',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR DICIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-12-05',
            'id_curso' => '6',
            'id_periodo'=>'3'
        ]);

        //------------------------------rubros de 6 to grado-------------------------------
        
        DB::table('rubros')->insert([
            'nombre'=>'PENSION ENERO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-02-05',
            'id_curso' => '7',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION FEBRERO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-03-05',
            'id_curso' => '7',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION MARZO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-04-05',
            'id_curso' => '7',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION ABRIL(2016)',
            'monto'=>'35',
            'fecha'=>'2016-05-05',
            'id_curso' => '7',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION MAYO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-06-05',
            'id_curso' => '7',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION JUNIO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-07-05',
            'id_curso' => '7',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION JULIO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-08-05',
            'id_curso' => '7',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION AGOSTO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-09-05',
            'id_curso' => '7',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION SEPTIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-10-05',
            'id_curso' => '7',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION OCTUBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-11-05',
            'id_curso' => '7',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION NOVIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-12-05',
            'id_curso' => '7',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION DICIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-12-15',
            'id_curso' => '7',
            'id_periodo'=>'3'
        ]);

        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR ENERO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-01-15',
            'id_curso' => '7',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR FEBRERO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-02-15',
            'id_curso' => '7',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR MARZO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-03-15',
            'id_curso' => '7',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR ABRIL(2016)',
            'monto'=>'35',
            'fecha'=>'2016-04-15',
            'id_curso' => '7',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR MAYO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-05-15',
            'id_curso' => '7',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR JUNIO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-06-15',
            'id_curso' => '7',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR JULIO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-07-15',
            'id_curso' => '7',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR ESCOLAR AGOSTO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-08-15',
            'id_curso' => '7',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR SEPTIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-09-15',
            'id_curso' => '7',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR OCTUBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-10-15',
            'id_curso' => '7',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR NOVIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-11-15',
            'id_curso' => '7',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR DICIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-12-05',
            'id_curso' => '7',
            'id_periodo'=>'3'
        ]);

        //------------------------------rubros de 7 mo grado-------------------------------
        
        DB::table('rubros')->insert([
            'nombre'=>'PENSION ENERO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-02-05',
            'id_curso' => '8',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION FEBRERO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-03-05',
            'id_curso' => '8',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION MARZO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-04-05',
            'id_curso' => '8',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION ABRIL(2016)',
            'monto'=>'35',
            'fecha'=>'2016-05-05',
            'id_curso' => '8',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION MAYO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-06-05',
            'id_curso' => '8',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION JUNIO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-07-05',
            'id_curso' => '8',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION JULIO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-08-05',
            'id_curso' => '8',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION AGOSTO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-09-05',
            'id_curso' => '8',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION SEPTIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-10-05',
            'id_curso' => '8',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION OCTUBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-11-05',
            'id_curso' => '8',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION NOVIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-12-05',
            'id_curso' => '8',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'PENSION DICIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-12-15',
            'id_curso' => '8',
            'id_periodo'=>'3'
        ]);

        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR ENERO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-01-15',
            'id_curso' => '8',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR FEBRERO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-02-15',
            'id_curso' => '8',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR MARZO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-03-15',
            'id_curso' => '8',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR ABRIL(2016)',
            'monto'=>'35',
            'fecha'=>'2016-04-15',
            'id_curso' => '8',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR MAYO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-05-15',
            'id_curso' => '8',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR JUNIO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-06-15',
            'id_curso' => '8',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR JULIO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-07-15',
            'id_curso' => '8',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR ESCOLAR AGOSTO(2016)',
            'monto'=>'35',
            'fecha'=>'2016-08-15',
            'id_curso' => '8',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR SEPTIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-09-15',
            'id_curso' => '8',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR OCTUBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-10-15',
            'id_curso' => '8',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR NOVIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-11-15',
            'id_curso' => '8',
            'id_periodo'=>'3'
        ]);
        DB::table('rubros')->insert([
            'nombre'=>'EXPRESO ESCOLAR DICIEMBRE(2016)',
            'monto'=>'35',
            'fecha'=>'2016-12-05',
            'id_curso' => '8',
            'id_periodo'=>'3'
        ]);
    }
}
