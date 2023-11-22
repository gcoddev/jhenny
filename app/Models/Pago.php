<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;
    protected $table = 'pagos';
    protected $primaryKey = 'id_pago';
    protected $fillable = [
        'nombre_pago',
        'descripcion_pago',
        'estado_pago',
        'created_at',
        'updated_at',
    ];
}
