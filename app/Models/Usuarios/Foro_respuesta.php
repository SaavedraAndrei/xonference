<?php

namespace App\Models\Usuarios;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Foro_respuesta extends Model
{
    use HasFactory;
    protected $table = 'foros_respuestas';
    protected $primaryKey = "id";

    protected $fillable = [
        'titulo', 
        'respuesta', 
        'dni_usuarios',
        'idEvento',
    ];  
}