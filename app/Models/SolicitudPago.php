<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudPago extends Model
{
    use HasFactory;
    protected $table = 'solicitud_pagos';
    protected $primaryKey = 'id_solicitud_pagos';
    protected $fillable = [
        'id_solicitud',
        'id_pago',
        'comprobante_pago',
        'estado',
        'created_at',
        'updated_at',
    ];

    public function solicitud()
    {
        return $this->belongsTo(Solicitud::class, 'id_solicitud', 'id_solicitud');
    }
    public function pago()
    {
        return $this->belongsTo(Pago::class, 'id_pago', 'id_pago');
    }
}
