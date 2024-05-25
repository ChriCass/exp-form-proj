<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleHorario extends Model
{
    use HasFactory;
    
    protected $table = 'detalle_horarios';

    // Definir la clave primaria
    protected $primaryKey = 'codigo_dho';

    // Indicar que la clave primaria es autoincremental
    public $incrementing = true;

    // Definir el tipo de la clave primaria
    protected $keyType = 'int';

    // Especificar los campos que se pueden asignar en masa
    protected $fillable = [
        'codigo_hor',
        'dia_dho',
        'tipo_dho',
        'horainicio_dho',
        'horafin_dho',
        'estado_dho',
    ];

    // Establecer los tipos de atributos
    protected $casts = [
        'estado_dho' => 'boolean',
    ];

    // Relación con el modelo Horario
    public function horario()
    {
        return $this->belongsTo(Horario::class, 'codigo_hor', 'codigo_hor');
    }
}
