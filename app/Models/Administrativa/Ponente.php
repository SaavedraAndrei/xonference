<?php

namespace App\Models\Administrativa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ponente extends Model
{
    use HasFactory;
    protected $table = 'ponentes';
    protected $primaryKey = "id";

    protected $fillable = [
        'nombre',
        'apellidoPaterno',
        'apellidoMaterno',
        'email',
        'dni',
        'descripcion',
        'telefono',
        'clave',
        'idEvento',
        'usuario_creacion',
        'usuario_actualizacion'
    ];  
}
