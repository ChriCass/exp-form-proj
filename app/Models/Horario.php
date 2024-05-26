<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;
    

     
    protected $table = 'horarios';

    // Definir la clave primaria
    protected $primaryKey = 'codigo_hor';

    // Indicar que la clave primaria es autoincremental
    public $incrementing = true;

    // Definir el tipo de la clave primaria
    protected $keyType = 'int';

    // Especificar los campos que se pueden asignar en masa
    protected $fillable = [
        'horainicio_hor',
        'horafin_hor',
        'estado_hor',
    ];

    // Establecer los tipos de atributos
    protected $casts = [
        'estado_hor' => 'boolean',
    ];
}
