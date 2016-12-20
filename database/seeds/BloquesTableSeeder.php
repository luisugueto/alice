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
        DB::table('bloques')->insert(['bloque' => '7:00 - 7:45','id_dia' => '1']);
        DB::table('bloques')->insert(['bloque' => '7:00 - 7:45','id_dia' => '2']);
        DB::table('bloques')->insert(['bloque' => '7:00 - 7:45','id_dia' => '3']);
        DB::table('bloques')->insert(['bloque' => '7:00 - 7:45','id_dia' => '4']);
        DB::table('bloques')->insert(['bloque' => '7:00 - 7:45','id_dia' => '5']);

        DB::table('bloques')->insert(['bloque' => '7:50 - 8:35','id_dia' => '1']);
        DB::table('bloques')->insert(['bloque' => '7:50 - 8:35','id_dia' => '2']);
        DB::table('bloques')->insert(['bloque' => '7:50 - 8:35','id_dia' => '3']);
        DB::table('bloques')->insert(['bloque' => '7:50 - 8:35','id_dia' => '4']);
        DB::table('bloques')->insert(['bloque' => '7:50 - 8:35','id_dia' => '5']);

        DB::table('bloques')->insert(['bloque' => '8:40 - 9:25','id_dia' => '1']);
        DB::table('bloques')->insert(['bloque' => '8:40 - 9:25','id_dia' => '2']);
        DB::table('bloques')->insert(['bloque' => '8:40 - 9:25','id_dia' => '3']);
        DB::table('bloques')->insert(['bloque' => '8:40 - 9:25','id_dia' => '4']);
        DB::table('bloques')->insert(['bloque' => '8:40 - 9:25','id_dia' => '5']);

        DB::table('bloques')->insert(['bloque' => '9:30 - 10:15','id_dia' => '1']);
        DB::table('bloques')->insert(['bloque' => '9:30 - 10:15','id_dia' => '2']);
        DB::table('bloques')->insert(['bloque' => '9:30 - 10:15','id_dia' => '3']);
        DB::table('bloques')->insert(['bloque' => '9:30 - 10:15','id_dia' => '4']);
        DB::table('bloques')->insert(['bloque' => '9:30 - 10:15','id_dia' => '5']);

        DB::table('bloques')->insert(['bloque' => '10:20 - 11:05','id_dia' => '1']);
        DB::table('bloques')->insert(['bloque' => '10:20 - 11:05','id_dia' => '2']);
        DB::table('bloques')->insert(['bloque' => '10:20 - 11:05','id_dia' => '3']);
        DB::table('bloques')->insert(['bloque' => '10:20 - 11:05','id_dia' => '4']);
        DB::table('bloques')->insert(['bloque' => '10:20 - 11:05','id_dia' => '5']);

        DB::table('bloques')->insert(['bloque' => '11:10 - 11:55','id_dia' => '1']);
        DB::table('bloques')->insert(['bloque' => '11:10 - 11:55','id_dia' => '2']);
        DB::table('bloques')->insert(['bloque' => '11:10 - 11:55','id_dia' => '3']);
        DB::table('bloques')->insert(['bloque' => '11:10 - 11:55','id_dia' => '4']);
        DB::table('bloques')->insert(['bloque' => '11:10 - 11:55','id_dia' => '5']);

        DB::table('bloques')->insert(['bloque' => '12:00 - 12:45','id_dia' => '1']);
        DB::table('bloques')->insert(['bloque' => '12:00 - 12:45','id_dia' => '2']);
        DB::table('bloques')->insert(['bloque' => '12:00 - 12:45','id_dia' => '3']);
        DB::table('bloques')->insert(['bloque' => '12:00 - 12:45','id_dia' => '4']);
        DB::table('bloques')->insert(['bloque' => '12:00 - 12:45','id_dia' => '5']);
    }
}
