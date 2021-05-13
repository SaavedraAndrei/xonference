<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Usuario extends Model
{
    protected $primaryKey = "id";

    protected $fillable = [
        'nombres',
        'apellidoPaterno',
        'apellidoMaterno',
        'email',
        'dni',
        'clave',
        'totalPago',
        'pagado',
        'id_asistencia',
        'id_conferencia',
        'usuario_creacion',
        'usuario_actualizacion',
        
    ];  
}
