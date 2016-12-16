<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
            'name' => 'Cesar',
            'email' => 'jcesarchg9@gmail.com',
            'password' => bcrypt('1234'),
            'roles_id' => '1'
        ]);
        // $this->call(UsersTableSeeder::class);
    }
}
