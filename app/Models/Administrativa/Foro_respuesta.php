<?php

namespace App\Models\Administrativa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Foro_respuestas extends Model
{
    use HasFactory;
    protected $table = 'foros_respuestas';
    protected $primaryKey = "id";

    protected $fillable = [
        'respuesta', 
        'dni_usuarios',
    ];  
}