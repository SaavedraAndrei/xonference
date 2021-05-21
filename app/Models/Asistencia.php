<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Asistencia extends Model
{
    protected $primaryKey = "id";

    protected $fillable = [
        'idConferencia',
        'fecha_hora',
        'asistio',
        'tipo',
        'dni'
    ];  
}
