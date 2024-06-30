<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    use HasFactory;

     
      protected $table = 'colaboradors';

      // Definir la clave primaria
      protected $primaryKey = 'codigo_col';
  
      // Indicar que la clave primaria es autoincremental
      public $incrementing = true;
  
      // Definir el tipo de la clave primaria
      protected $keyType = 'int';
  
      // Especificar los campos que se pueden asignar en masa
      protected $fillable = [
          'codigo_tdoc',
          'numerodoc_col',
          'apellidopaterno_col',
          'apellidomaterno_col',
          'nombres_col',
          'codigo_sex',
          'codigo_cgo',
          'codigo_rp',
          'codigo_eps',
          'remuneracion_col',
          'fechaingreso_col',
          'fechacese_per',
          'estado_col',
          'fecha_col',
          'fecha_mod',
          'fecha_eli',
      ];
  
      // Establecer los tipos de atributos
      protected $casts = [
          'remuneracion_col' => 'decimal:2',
          'estado_col' => 'boolean',
      ];
  
      // Relación con el modelo TipoDocumento
      public function tipoDocumento()
      {
          return $this->belongsTo(TipoDocumento::class, 'codigo_tdoc', 'codigo_tdoc');
      }
  
      // Relación con el modelo Sexo
      public function sexo()
      {
          return $this->belongsTo(Sexo::class, 'codigo_sex', 'codigo_sex');
      }
  
      // Relación con el modelo Cargo
      public function cargo()
      {
          return $this->belongsTo(Cargo::class, 'codigo_cgo', 'codigo_cgo');
      }
  
      // Relación con el modelo RegimenPensionario
      public function regimenPensionario()
      {
          return $this->belongsTo(RegimenPensionario::class, 'codigo_rp', 'codigo_rp');
      }
  
      // Relación con el modelo Eps
      public function eps()
      {
          return $this->belongsTo(Eps::class, 'codigo_eps', 'codigo_eps');
      }

      public function contratos()
      {
          return $this->hasMany(ContratoColaborador::class, 'codigo_col');
      }
}
