<?php

use Illuminate\Database\Seeder;

class TipoRecuperativosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_recuperativos')->insert([
            'tipo' => 'RECUPERACIÓN'
        ]);
        DB::table('tipo_recuperativos')->insert([
            'tipo' => 'SUPLETORIO'
        ]);
        DB::table('tipo_recuperativos')->insert([
            'tipo' => 'REMEDIAL'
        ]);
        DB::table('tipo_recuperativos')->insert([
            'tipo' => 'GRACIA'
        ]);
    }
}
