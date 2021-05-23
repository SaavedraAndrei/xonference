<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Asistencia extends Model
{
    use HasFactory;
    protected $table = 'asistencias';
    protected $primaryKey = "id";

    protected $fillable = [
        'idConferencia',
        'fecha_hora',
        'asistio',
        'tipo',
        'dni'
    ];  
}
