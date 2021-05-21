<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $primaryKey = "id";

    protected $fillable = [
        'nombre',
        'tematica',
        'descripcion',
        'fecha_evento',
        'hora_evento',
        'hora_fin',
        'idPonente',
        'idCategoria',
        'usuario_creacion',
        'usuario_actualizacion'
    ];  
}
