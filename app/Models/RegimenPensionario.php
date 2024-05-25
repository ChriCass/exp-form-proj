<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegimenPensionario extends Model
{
    use HasFactory;
      
      protected $table = 'regimen_pensionarios';

      // Definir la clave primaria
      protected $primaryKey = 'codigo_rp';
  
      // Indicar que la clave primaria es autoincremental
      public $incrementing = true;
  
      // Definir el tipo de la clave primaria
      protected $keyType = 'int';
  
      // Especificar los campos que se pueden asignar en masa
      protected $fillable = [
          'nombre_rp',
          'tipo_rp',
          'porcentaje_rp',
          'abreviatura_rp',
          'estado_rp',
      ];
  
      // Establecer los tipos de atributos
      protected $casts = [
          'estado_rp' => 'boolean',
      ];
}
