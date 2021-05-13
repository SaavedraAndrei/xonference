<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConferenciaController extends Controller
{
    public function index()
    {
        $eventos = DB::table('eventos')
            ->leftjoin('ponentes', 'eventos.idPonente', '=', 'ponentes.id')
            ->leftjoin('categorias', 'eventos.idCategoria', '=', 'categorias.id')
            ->select(
                'eventos.nombre as evento',
                'eventos.fecha_evento',
                'eventos.hora_evento',
                'eventos.tematica',
                'eventos.descripcion',
                'categorias.nombre as categoria',
                'ponentes.nombre as ponentenombre',
                'ponentes.apellidoPaterno as ponenteapellido'
            )
            ->get();
        return view('catalogo', compact('eventos'));
    }
}
