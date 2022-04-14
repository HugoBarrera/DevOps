<?php

use App\Models\Estatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        /* Método de inserción a través del modelo (recomendado ya que es más inteligente) */
        Estatus::create([
            'nombre' => 'Abierto'
        ]);
        Estatus::create([
            'nombre' => 'Finalizado'
        ]);
        Estatus::create([
            'nombre' => 'Cancelado'
        ]);

        /* Método de inserción a través de query builder (Directo, sin modelo) */
        // DB::table('estatus')->insert([
        //     [
        //         'nombre' => 'Pendiente',
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'nombre' => 'Finalizado',
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'nombre' => 'Cancelado',
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ]
        // ]);
    }
}
