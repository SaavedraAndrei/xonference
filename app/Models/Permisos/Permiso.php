<?php

namespace App\Models\Permisos;
use Illuminate\Database\Eloquent\Model;


class Permiso extends Model
{
    protected $primaryKey = "id";

    protected $fillable = [
        'modulo', 
    ];  
}