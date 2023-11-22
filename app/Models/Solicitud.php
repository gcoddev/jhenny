<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;
    protected $table ='solicituds';
    protected $primaryKey ='id_solicitud';
    protected $fillable = [
        'id',
        'id_asignado',
        'id_idioma',
        'titulo_solicitud',
        'descripcion_solicitud',
        'estado_solicitud',
        'created_at',
        'updated_at',
    ];

    public function idioma()
    {
        return $this->belongsTo(Idioma::class, 'id_idioma', 'id_idioma');
    }
    public function asignado()
    {
        return $this->belongsTo(User::class, 'id_asignado', 'id');
    }
    public function solicitud_pago()
    {
        return $this->belongsTo(SolicitudPago::class, 'id_solicitud', 'id_solicitud');
    }
}
