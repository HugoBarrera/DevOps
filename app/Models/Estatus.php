<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estatus extends Model {
    /* Para corregir el problema que se tiene con el nombre de clases en español, instanciamos el nombre de la tabla en una variable */
    protected $table = 'estatus';

    /* Indicamos a Laravel el nombre de las columnas que estan permitidas modificar */
    protected $fillable = [
        'nombre', 'status'
    ];
}
