<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    // Definir el nombre de la tabla si no sigue la convención de nombres plural
    protected $table = 'rols';

    // Definir la clave primaria
    protected $primaryKey = 'codigo_rol';

    // Indicar que la clave primaria es autoincremental
    public $incrementing = true;

    // Definir el tipo de la clave primaria
    protected $keyType = 'int';

    // Especificar los campos que se pueden asignar en masa
    protected $fillable = [
        'nombre_rol',
        'estado_rol',
    ];

    // Establecer los tipos de atributos
    protected $casts = [
        'estado_rol' => 'boolean',
    ];
}
