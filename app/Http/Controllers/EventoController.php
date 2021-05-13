<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventoController extends Controller
{
    public function index()
    {
        mb_internal_encoding('UTF-8');

        $conferencia = DB::table('eventos')
            ->leftjoin('ponentes', 'eventos.idPonente', '=', 'ponentes.id')
            ->leftjoin('categorias', 'eventos.idCategoria', '=', 'categorias.id')
            ->select(
                'eventos.nombre as evento',
                'eventos.fecha_evento',
                'eventos.hora_evento',
                'categorias.nombre as categoria',
                'ponentes.nombre as ponentenombre',
                'ponentes.apellidoPaterno as ponenteapellido'
            )
            ->get();



        $calendario = array();

        foreach ($conferencia as $confe) {
            $fecha = $confe->fecha_evento;

            $calendario[$fecha][] = $confe;
        }



        return view('calendario', compact('conferencia', 'calendario'));
    }
}
