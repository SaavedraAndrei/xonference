<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Administracion\PermisosController;
use App\Http\Controllers\IndexController;

use App\Models\Administrativa\Foro_pregunta;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ForosController extends Controller
{
    public function foros_admin(){
        $x = session()->all();
        if (empty($x['usuario_dni'])) {
            return view('welcome');
        }else {
            $band = (new PermisosController)->verificarPermiso($x['usuario_dni'], 'FOROS', 'GESTIÓN ADMINISTRATIVA');
            if ($band == 1) {
                $preguntas = Foro_pregunta::from('foros_preguntas as fp')
                ->select(
                    'pregunta', 
                    'dni_ponente'
                )
                ->get();
                return Inertia::render('General/foros_admin',[
                    'preguntas' => $preguntas,
                ]);
            } else {
                $mensaje = 'RECHAZADO';
                return (new IndexController)->home($mensaje);
                die();
            }
        } 
    }
    public function foros_usuarios()
    {
        $x = session()->all();
        if (empty($x['usuario_dni'])) {
            return view('welcome');
        }else {
            $band = (new PermisosController)->verificarPermiso($x['usuario_dni'], 'FOROS', 'USUARIOS');
            if ($band == 1) {
                return Inertia::render('Usuarios/usuarios_foros');
            } else {
                $mensaje = 'RECHAZADO';
                return (new IndexController)->home($mensaje);
                die();
            }
        } 
    }
}
