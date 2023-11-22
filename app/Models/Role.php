<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $primaryKey = 'id_role';
    protected $fillable = [
        'nombre_role',
        'estado_role',
        'created_at',
        'updated_at',
    ];
}
