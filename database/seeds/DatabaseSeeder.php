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

        

    	$this->call(UsersTableSeeder::class); 
        $this->call(CursosTableSeeder::class);
        $this->call(AsignaturasTableSeeder::class);
        $this->call(EquivalenciasTableSeeder::class);
        $this->call(ComportamientoTableSeeder::class);
        $this->call(CategoriasParcialTableSeeder::class);
        $this->call(TipoEmpleadoSeeder::class);
        $this->call(AreasSeeder::class);
        $this->call(CargosSeeder::class);
        $this->call(PeriodosSeeder::class);
        $this->call(IESSSeeder::class);
        $this->call(ModalidadsPagoSeeder::class);
        $this->call(FormasPagoSeeder::class);
        $this->call(PersonalSeeder::class);
        $this->call(DiasTableSeeder::class);
        $this->call(BloquesTableSeeder::class);
        $this->call(EstudiantesSeeder::class);
        Model::reguard();
    }
}
