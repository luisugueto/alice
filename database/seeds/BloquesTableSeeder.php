<?php

use Illuminate\Database\Seeder;

class BloquesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bloques')->insert(['bloque' => '7:00 - 7:20','id_dia' => '1']);
        DB::table('bloques')->insert(['bloque' => '7:00 - 7:20','id_dia' => '2']);
        DB::table('bloques')->insert(['bloque' => '7:00 - 7:20','id_dia' => '3']);
        DB::table('bloques')->insert(['bloque' => '7:00 - 7:20','id_dia' => '4']);
        DB::table('bloques')->insert(['bloque' => '7:00 - 7:20','id_dia' => '5']);
        

        DB::table('bloques')->insert(['bloque' => '7:20 - 8:00','id_dia' => '1']);
        DB::table('bloques')->insert(['bloque' => '7:20 - 8:00','id_dia' => '2']);
        DB::table('bloques')->insert(['bloque' => '7:20 - 8:00','id_dia' => '3']);
        DB::table('bloques')->insert(['bloque' => '7:20 - 8:00','id_dia' => '4']);
        DB::table('bloques')->insert(['bloque' => '7:20 - 8:00','id_dia' => '5']);

        DB::table('bloques')->insert(['bloque' => '8:00 - 8:40','id_dia' => '1']);
        DB::table('bloques')->insert(['bloque' => '8:00 - 8:40','id_dia' => '2']);
        DB::table('bloques')->insert(['bloque' => '8:00 - 8:40','id_dia' => '3']);
        DB::table('bloques')->insert(['bloque' => '8:00 - 8:40','id_dia' => '4']);
        DB::table('bloques')->insert(['bloque' => '8:00 - 8:40','id_dia' => '5']);

        DB::table('bloques')->insert(['bloque' => '8:40 - 9:20','id_dia' => '1']);
        DB::table('bloques')->insert(['bloque' => '8:40 - 9:20','id_dia' => '2']);
        DB::table('bloques')->insert(['bloque' => '8:40 - 9:20','id_dia' => '3']);
        DB::table('bloques')->insert(['bloque' => '8:40 - 9:20','id_dia' => '4']);
        DB::table('bloques')->insert(['bloque' => '8:40 - 9:20','id_dia' => '5']);

        DB::table('bloques')->insert(['bloque' => '9:20 - 9:40','id_dia' => '1']);
        DB::table('bloques')->insert(['bloque' => '9:20 - 9:40','id_dia' => '2']);
        DB::table('bloques')->insert(['bloque' => '9:20 - 9:40','id_dia' => '3']);
        DB::table('bloques')->insert(['bloque' => '9:20 - 9:40','id_dia' => '4']);
        DB::table('bloques')->insert(['bloque' => '9:20 - 9:40','id_dia' => '5']);

        DB::table('bloques')->insert(['bloque' => '9:40 - 10:20','id_dia' => '1']);
        DB::table('bloques')->insert(['bloque' => '9:40 - 10:20','id_dia' => '2']);
        DB::table('bloques')->insert(['bloque' => '9:40 - 10:20','id_dia' => '3']);
        DB::table('bloques')->insert(['bloque' => '9:40 - 10:20','id_dia' => '4']);
        DB::table('bloques')->insert(['bloque' => '9:40 - 10:20','id_dia' => '5']);

        DB::table('bloques')->insert(['bloque' => '10:20 - 11:00','id_dia' => '1']);
        DB::table('bloques')->insert(['bloque' => '10:20 - 11:00','id_dia' => '2']);
        DB::table('bloques')->insert(['bloque' => '10:20 - 11:00','id_dia' => '3']);
        DB::table('bloques')->insert(['bloque' => '10:20 - 11:00','id_dia' => '4']);
        DB::table('bloques')->insert(['bloque' => '10:20 - 11:00','id_dia' => '5']);

        DB::table('bloques')->insert(['bloque' => '11:00 - 11:40','id_dia' => '1']);
        DB::table('bloques')->insert(['bloque' => '11:00 - 11:40','id_dia' => '2']);
        DB::table('bloques')->insert(['bloque' => '11:00 - 11:40','id_dia' => '3']);
        DB::table('bloques')->insert(['bloque' => '11:00 - 11:40','id_dia' => '4']);
        DB::table('bloques')->insert(['bloque' => '11:00 - 11:40','id_dia' => '5']);

        DB::table('bloques')->insert(['bloque' => '11:40 - 12:20','id_dia' => '1']);
        DB::table('bloques')->insert(['bloque' => '11:40 - 12:20','id_dia' => '2']);
        DB::table('bloques')->insert(['bloque' => '11:40 - 12:20','id_dia' => '3']);
        DB::table('bloques')->insert(['bloque' => '11:40 - 12:20','id_dia' => '4']);
        DB::table('bloques')->insert(['bloque' => '11:40 - 12:20','id_dia' => '5']);

    }
}
