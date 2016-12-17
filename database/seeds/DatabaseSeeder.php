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
         DB::table('roles')->insert([
            'nombre' => 'Administrador',
            'descripcion' => 'Administrador',
        ]);
        DB::table('roles')->insert([
            'nombre' => 'Director',
            'descripcion' => 'Director',
        ]);
        DB::table('roles')->insert([
            'nombre' => 'Profesor',
            'descripcion' => 'Profesor',
        ]);
        DB::table('roles')->insert([
            'nombre' => 'Recurso Humano',
            'descripcion' => 'Recurso Humano',
        ]);
        DB::table('roles')->insert([
            'nombre' => 'DACE',
            'descripcion' => 'DACE',
        ]);
        DB::table('users')->insert([
            'name' => 'Luis',
            'email' => 'blink242@outlook.com',
            'password' => bcrypt('1234'),
            'roles_id' => '1'
        ]);
        DB::table('users')->insert([
            'name' => 'Jesus',
            'email' => 'mtr_1101@hotmail.com',
            'password' => bcrypt('root'),
            'roles_id' => '1'
        ]);
        DB::table('users')->insert([

            'name' => 'Cesar',
            'email' => 'jcesarchg9@gmail.com',
            'password' => bcrypt('1234'),
            'roles_id' => '1'
        ]);
        
        DB::table('tipo_empleado')->insert([
            'tipo_empleado' => 'Administrativo'
        ]);
        DB::table('tipo_empleado')->insert([
            'tipo_empleado' => 'Docente'
        ]);
        DB::table('tipo_empleado')->insert([
            'tipo_empleado' => 'Obrero'
        ]);
        
    	// $this->call(UsersTableSeeder::class);
     //    $this->call(CursosTableSeeder::class);
     //    $this->call(AsignaturasTableSeeder::class);
     //    $this->call(NomenclaturasTableSeeder::class);
     //    $this->call(EquivalenciasTableSeeder::class);
     //    $this->call(ComportamientoTableSeeder::class);
     //    $this->call(CategoriasParcialTableSeeder::class);
        Model::reguard();
    }
}
