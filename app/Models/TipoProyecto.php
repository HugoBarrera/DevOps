<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoProyecto extends Model
{
    /* Para corregir el problema que se tiene con el nombre de clases en español, instanciamos el nombre de la tabla en una variable */
    protected $table = 'tipo_proyecto';

    /* Indicamos a Laravel el nombre de las columnas que estan permitidas modificar */
    protected $fillable = [
        'nombre', 'estado'
    ];

    /* Esta propiedad permite ocultar datos para que no se muestren en las consultas */
    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
