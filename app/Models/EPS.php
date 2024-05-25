<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EPS extends Model
{
    use HasFactory;
      
      protected $table = 'eps';

      // Definir la clave primaria
      protected $primaryKey = 'codigo_eps';
  
      // Indicar que la clave primaria es autoincremental
      public $incrementing = true;
  
      // Definir el tipo de la clave primaria
      protected $keyType = 'int';
  
      // Especificar los campos que se pueden asignar en masa
      protected $fillable = [
          'nombre_eps',
          'tipo_eps',
          'abreviatura_eps',
          'estado_eps',
      ];
  
      // Establecer los tipos de atributos
      protected $casts = [
          'estado_eps' => 'boolean',
      ];
}
