<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoContactoColaborador extends Model
{
    use HasFactory;

      
     protected $table = 'tipo_contacto_colaboradors';

     // Definir la clave primaria
     protected $primaryKey = 'codigo_tcc';
 
     // Indicar que la clave primaria es autoincremental
     public $incrementing = true;
 
     // Definir el tipo de la clave primaria
     protected $keyType = 'int';
 
     // Especificar los campos que se pueden asignar en masa
     protected $fillable = [
         'nombre_tcc',
         'abreviatura_tcc',
     ];
}
