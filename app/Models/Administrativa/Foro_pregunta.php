<?php

namespace App\Models\Administrativa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Foro_pregunta extends Model
{
    use HasFactory;
    protected $table = 'foros_preguntas';
    protected $primaryKey = "id";

    protected $fillable = [
        'pregunta', 
        'dni_ponente',
        'idEvento',
    ];  
}