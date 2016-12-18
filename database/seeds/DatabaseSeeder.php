<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Model::unguard();

        DB::table('cargos')->insert([
            'nombre' => 'Secretaria'
        ]);

    	$this->call(UsersTableSeeder::class); 
        $this->call(CursosTableSeeder::class);
        $this->call(AsignaturasTableSeeder::class);
<<<<<<< HEAD
        //$this->call(NomenclaturasTableSeeder::class);
=======
        #$this->call(NomenclaturasTableSeeder::class);
>>>>>>> 5786df067abe3f94b85c559b7a6e316466ecc461
        $this->call(EquivalenciasTableSeeder::class);
        $this->call(ComportamientoTableSeeder::class);
        $this->call(CategoriasParcialTableSeeder::class);
        $this->call(TipoEmpleadoSeeder::class);
        $this->call(PeriodosSeeder::class);
        $this->call(IESSSeeder::class);

        Model::reguard();
    }
}
