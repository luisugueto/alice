<?php

use Illuminate\Database\Seeder;

class IESSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('i_e_s_s')->insert([
            'nombre' => 'Patrono',
            'valor' => '12.40'
        ]);

        DB::table('i_e_s_s')->insert([
            'nombre' => 'Personal',
            'valor' => '9.40'
        ]);
    }
}
