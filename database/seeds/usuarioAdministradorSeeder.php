<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class usuarioAdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Crea el usuario administrador por defecto
        DB::table('users')->insert([
            'name'=>'Administrador',
            'last_name'=>'SU',
            'id_area'=>'5',
            'email'=>'superusuario@hotmail.com',
            'password'=>bcrypt('superusuario123')
        ]);
        DB::table('users_rol')->insert([
            'rol_id'=>1,
            'usuario_id'=>1,
            'estado'=>1
        ]);

    }
}
