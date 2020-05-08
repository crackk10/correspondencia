<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    /*esta funcion llama la funcion "truncateTablas" para truncar las tablas
    permitiendo llenar las llaves foraneas, para ellos pasa el nombre de las tablas como parametro.
    luego las llena invocando cada uno de los sedders*/
    {   $this->truncateTablas([
        'rol',
        'users'
        ]);
        // $this->call(UsersTableSeeder::class);
        $this->call(TablaRolSeeder::class);
        $this->call(usuarioAdministradorSeeder::class);
    }
    protected function truncateTablas(array $tablas)
    {//esta funcion trunca cada una de las tablas pasadas por el array "$tablas"
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach($tablas as $tabla){
            DB::table($tabla)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
