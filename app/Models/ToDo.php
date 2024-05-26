<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
    use HasFactory;
    protected $table = 'to_do';
    
    // Define los campos que se pueden asignar en masa
    protected $fillable = ['task', 'completed'];
}
