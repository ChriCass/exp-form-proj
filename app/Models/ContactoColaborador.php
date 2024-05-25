<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactoColaborador extends Model
{
    use HasFactory;
    
    protected $table = 'contacto_colaboradors';

    // Definir la clave primaria
    protected $primaryKey = 'codigo_con';

    // Indicar que la clave primaria es autoincremental
    public $incrementing = true;

    // Definir el tipo de la clave primaria
    protected $keyType = 'int';

    // Especificar los campos que se pueden asignar en masa
    protected $fillable = [
        'codigo_col',
        'codigo_tcc',
        'descripcion_con',
        'principal_con',
        'estado_con',
        'fecha_reg',
        'fecha_mod',
        'fecha_eli',
    ];

    // Establecer los tipos de atributos
    protected $casts = [
        'principal_con' => 'boolean',
        'estado_con' => 'boolean',
    ];

    // Relación con el modelo Colaborador
    public function colaborador()
    {
        return $this->belongsTo(Colaborador::class, 'codigo_col', 'codigo_col');
    }

    // Relación con el modelo TipoContactoColaborador
    public function tipoContacto()
    {
        return $this->belongsTo(TipoContactoColaborador::class, 'codigo_tcc', 'codigo_tcc');
    }
}
