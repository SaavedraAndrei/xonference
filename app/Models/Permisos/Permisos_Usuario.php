<?php

namespace App\Models\Permisos;
use Illuminate\Database\Eloquent\Model;


class Permisos_Usuario extends Model
{
    protected $primaryKey = "id";

    protected $fillable = [
        'dni',
        'id_permiso',
    ];  
}