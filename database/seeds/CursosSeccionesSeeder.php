<?php

use Illuminate\Database\Seeder;

class CursosSeccionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		
    	for ($i=1; $i <=8; $i++) { 
    		
    	
		 DB::table('secciones')->insert([

            'id_curso' => $i,
            'literal' => 'A',
            'capacidad' => 50,

        ]);

		}

		for ($i=1; $i <=8; $i++) { 
    		
    	
		 DB::table('secciones')->insert([

            'id_curso' => $i,
            'literal' => 'B',
            'capacidad' => 50,

        ]);
		}
		 for ($i=1; $i <=8; $i++) { 
    		
    	
		 DB::table('secciones')->insert([

            'id_curso' => $i,
            'literal' => 'C',
            'capacidad' => 50,

        ]);

		}
		
        
    }
}
