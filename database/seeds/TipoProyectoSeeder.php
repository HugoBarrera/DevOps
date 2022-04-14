<?php

use Illuminate\Database\Seeder;

class TipoProyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('tipo_proyecto')->insert([
            [
                'nombre' => 'Personal',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Negocios',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Caridad',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Familiar',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
