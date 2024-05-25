<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;

     
     protected $table = 'cargos';

     // Definir la clave primaria
     protected $primaryKey = 'codigo_cgo';
 
     // Indicar que la clave primaria es autoincremental
     public $incrementing = true;
 
     // Definir el tipo de la clave primaria
     protected $keyType = 'int';
 
     // Especificar los campos que se pueden asignar en masa
     protected $fillable = [
         'codigo_are',
         'nombre_cgo',
         'abreviatura_cgo',
         'estado_cgo',
     ];
 
     // Establecer los tipos de atributos
     protected $casts = [
         'estado_cgo' => 'boolean',
     ];
 
     // Relación con el modelo Area
     public function area()
     {
         return $this->belongsTo(Area::class, 'codigo_are', 'codigo_are');
     }
}
