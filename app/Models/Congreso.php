<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Congreso extends Model
{
    use HasFactory;
    protected $table = 'congresos';
    protected $primaryKey = "id";

    // protected $fillable = [
    //     'idConferencia',
    //     'fecha_hora',
    //     'asistio',
    //     'tipo',
    //     'dni'
    // ];  
}
