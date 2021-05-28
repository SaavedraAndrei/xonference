<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Administracion\PermisosController;
use App\Http\Controllers\IndexController;

use App\Models\Administrativa\Foro_pregunta;
use App\Models\Administrativa\Foro_respuesta;
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
                    'id',
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
                $preguntas = Foro_pregunta::from('foros_preguntas as fp')
                ->select(
                    'id',
                    'pregunta', 
                    'dni_ponente'
                )
                ->get();
                $respuestas = Foro_respuesta::from('foros_respuestas')
                ->select(
                    'id',
                    'respuesta', 
                    'dni_usuarios'
                )
                ->get();
                return Inertia::render('Usuarios/usuarios_foros', [
                    'preguntas' => $preguntas,
                    'respuestas' => $respuestas,
                ]);
            } else {
                $mensaje = 'RECHAZADO';
                return (new IndexController)->home($mensaje);
                die();
            }
        } 
    }

    public function guardar_pregunta(Request $request){
        //  dd($request);
         $modal = $request->modal;
         $x = session()->all();
         $dni_ponente = $x['usuario_dni'];
         $pregunta = mb_strtoupper($request->pregunta);
 

           if ($modal == 'EDITAR') {
            
             $id = $request->id;
            //  dd($id);
             Foro_pregunta::where('id', $id)
                 ->update([
                     'pregunta' => $pregunta,
                     'dni_ponente' => $dni_ponente
                 ]);
             // $resultado = 'EXITO';
         }
 
         // return redirect()->route('Permisos/permisos_listar');
 
         return redirect()->route('administrativa.foros');
    }
}
