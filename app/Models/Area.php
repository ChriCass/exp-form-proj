<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
     
     protected $table = 'areas';

     // Definir la clave primaria
     protected $primaryKey = 'codigo_are';
 
     // Indicar que la clave primaria es autoincremental
     public $incrementing = true;
 
     // Definir el tipo de la clave primaria
     protected $keyType = 'int';
 
     // Especificar los campos que se pueden asignar en masa
     protected $fillable = [
         'nombre_are',
         'abreviatura_are',
         'estado_are',
     ];
 
     // Establecer los tipos de atributos
     protected $casts = [
         'estado_are' => 'boolean',
     ];
}
