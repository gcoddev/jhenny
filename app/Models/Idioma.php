<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    use HasFactory;
    protected $table = 'idiomas';
    protected $primaryKey = 'id_idioma';
    protected $fillable = [
        'nombre_idioma',
        'imagen_idioma',
        'tipo_idioma',
        'estado_idioma',
        'created_at',
        'updated_at',
    ];
}
