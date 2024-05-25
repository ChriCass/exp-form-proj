<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
    use HasFactory;

    
    protected $table = 'sexos';

    // Definir la clave primaria
    protected $primaryKey = 'codigo_sex';

    // Indicar que la clave primaria no es autoincremental
    public $incrementing = true;

    // Definir el tipo de la clave primaria
    protected $keyType = 'int';

    // Especificar los campos que se pueden asignar en masa
    protected $fillable = [
        'nombre_sex',
        'abreviatura_sex',
        'estado_sex',
    ];

    // Establecer los tipos de atributos
    protected $casts = [
        'estado_sex' => 'boolean',
    ];
}
