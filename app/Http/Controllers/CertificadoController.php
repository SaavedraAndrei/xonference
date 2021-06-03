<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Session;

class CertificadoController extends Controller
{
    public function index()
    {

        $ponentes = DB::table('ponentes')->where('nombre', 'Andres')->first();


        return view('certificado',  compact('ponentes'));
    }

    public function download()
    {
        $congreso = DB::table('congresos')->first();
        $ponentes = DB::table('ponentes')->first();

        $nombre_usuario = Session::get('nombre_usuario');

        // $ponentes = DB::table('ponentes')->get();

        // return view('invitados', compact('ponentes'));


        $pdf = PDF::loadView('certificado', ['nombre_usuario' => $nombre_usuario]);
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
