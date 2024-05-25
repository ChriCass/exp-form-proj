<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    use HasFactory;

     
    protected $table = 'tipo_documentos';

    // Definir la clave primaria
    protected $primaryKey = 'codigo_tdoc';

    // Indicar que la clave primaria no es autoincremental
    public $incrementing = true;

    // Definir el tipo de la clave primaria
    protected $keyType = 'int';

    // Especificar los campos que se pueden asignar en masa
    protected $fillable = [
        'nombre_tdoc',
        'abreviatura_tdoc',
        'estado_tdoc',
    ];

    // Establecer los tipos de atributos
    protected $casts = [
        'estado_tdoc' => 'boolean',
    ];
}
