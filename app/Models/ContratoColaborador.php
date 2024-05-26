<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContratoColaborador extends Model
{
    use HasFactory;

    // Definir el nombre de la tabla si no sigue la convención de nombres plural
    protected $table = 'contrato_colaboradors';

    // Definir la clave primaria
    protected $primaryKey = 'codigo_cco';

    // Indicar que la clave primaria es autoincremental
    public $incrementing = true;

    // Definir el tipo de la clave primaria
    protected $keyType = 'int';

    // Especificar los campos que se pueden asignar en masa
    protected $fillable = [
        'codigo_col',
        'codigo_hor',
        'fechainicio_cco',
        'fechafin_cco',
        'remuneracion_cco',
        'estado_cto',
    ];

    // Establecer los tipos de atributos
    protected $casts = [
        'remuneracion_cco' => 'decimal:2',
        'estado_cto' => 'boolean',
    ];

    // Relación con el modelo Colaborador
    public function colaborador()
    {
        return $this->belongsTo(Colaborador::class, 'codigo_col', 'codigo_col');
    }

    // Relación con el modelo Horario
    public function horario()
    {
        return $this->belongsTo(Horario::class, 'codigo_hor', 'codigo_hor');
    }

    
}
