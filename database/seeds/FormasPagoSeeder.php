<?php

use Illuminate\Database\Seeder;

class FormasPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formas_pagos')->insert([
            'forma' => 'Efectivo',
        ]);
        DB::table('formas_pagos')->insert([
            'forma' => 'Cheque',
        ]);
        DB::table('formas_pagos')->insert([
            'forma' => 'Transferencia',
        ]);
    }
}
