<?php

use Illuminate\Database\Seeder;

class ModalidadsPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modalidads')->insert([
            'modalidad' => 'Exacto'
        ]);

        DB::table('modalidads')->insert([
            'modalidad' => 'Abono'
        ]);
    }
}
