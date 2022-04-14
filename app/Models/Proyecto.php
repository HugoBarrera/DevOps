<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    /* Para corregir el problema que se tiene con el nombre de clases en español, instanciamos el nombre de la tabla en una variable */
    protected $table = 'proyectos';

    /* Indicamos a Laravel el nombre de las columnas que estan permitidas modificar */
    protected $fillable = [
        'nombre', 'descripcion', 'slug', 'proyecto_id', 'estatus_id', 'user_id'
    ];

    /* Relaciones */
    public function estatus() {
        /**
         * belongsTo() maneja 2 parametros:
         * - La clase con la que haremos la relación.
         * - El campo que tiene la relación (se debe agregar la columna de "este" módelo).
         */
        return $this->belongsTo(Estatus::class, 'estatus_id');
    }

    public function usuario() {
        return $this->belongsTo(User::class, 'user_id');
        //return $this->belongsTo('App\User'::class, user_id); /* Funciona igual, la diferencia es que agregamos la ruta del archivo en lugar de importar la clase */
    }

    public function tipo() {
        return $this->belongsTo(TipoProyecto::class, 'proyecto_id');
    }
}
