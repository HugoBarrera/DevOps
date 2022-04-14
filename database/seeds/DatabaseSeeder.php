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
        /* Aqui se agregan todas las Clases Seeders que creamos para que se ejecuten */
        $this->call(EstatusSeeder::class);
        $this->call(TipoProyectoSeeder::class);
    }
}
