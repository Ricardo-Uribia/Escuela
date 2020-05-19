<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Insert_Estados_Seeder::class);
        $this->call(Insert_User_Seeder::class);         
        $this->call(Insert_Empleado_Seeder::class);
        $this->call(Insert_Administrativo_Seeder::class);
        $this->call(Insert_Actividades_Trabajo_Seeder::class);
        $this->call(Insert_Escolaridades_Seeder::class);
    }
}
