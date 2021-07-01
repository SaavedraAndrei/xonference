<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Administracion\PermisosController;
use App\Http\Controllers\IndexController;

use App\Models\Administrativa\Foro_pregunta;
use App\Models\Usuarios\Foro_respuesta;
use App\Models\Evento;
use App\Models\Congreso;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ForosController extends Controller
{
    public function foros_admin(){
        $x = session()->all();
        if (empty($x['usuario_dni'])) {
            $congresos = Congreso::all();
            return view('welcome', array('congresos' => $congresos));
        }else {
            $band = (new PermisosController)->verificarPermiso($x['usuario_dni'], 'FOROS', 'GESTIÓN ADMINISTRATIVA');
            if ($band == 1) {
                $eventos = Evento::select(
                    'id',
                    'nombre'
                )
                ->get();
                $preguntas = Foro_pregunta::from('foros_preguntas as fp')
                ->select(
                    'fp.id',
                    'fp.pregunta', 
                    'fp.dni_ponente',
                    'fp.idEvento',
                    'e.nombre as nombreConferencia',
                    'po.nombre',
                    'po.apellidoPaterno'
                )
                ->join('ponentes as po', 'fp.dni_ponente','=','po.dni')
                ->join('eventos as e', 'fp.idEvento','=','e.id')
                ->get();

                $respuestas= Foro_respuesta::from('foros_respuestas as fr')
                ->select(
                    'fr.id',
                    'fr.titulo',
                    'fr.respuesta',
                    'u.nombres',
                    'u.apellidoPaterno',
                    'u.apellidoMaterno',
                    'u.dni',
                    'u.email',
                    'fr.idEvento',
                    'e.nombre'
                 )
                 ->join('usuarios as u', 'fr.dni_usuarios','=','u.dni')
                 ->join('eventos as e', 'fr.idEvento','=','e.id')
                ->get();
                return Inertia::render('Administrativa/foros_admin',[
                    'preguntas' => $preguntas,
                    'eventos' =>$eventos,
                    'respuestas' => $respuestas,
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
            $congresos = Congreso::all();
            return view('welcome', array('congresos' => $congresos));
        }else {
            $band = (new PermisosController)->verificarPermiso($x['usuario_dni'], 'FOROS', 'USUARIOS');
            if ($band == 1) {
                
                $preguntas = Foro_pregunta::from('foros_preguntas as fr')
                ->select(
                    'fr.id',
                    'fr.pregunta', 
                    'fr.dni_ponente',
                    'fr.idEvento',
                    'e.nombre as nombreConferencia',
                    'po.nombre',
                    'po.apellidoPaterno',
                )
                ->join('ponentes as po', 'fr.dni_ponente','=','po.dni')
                ->join('eventos as e', 'fr.idEvento','=','e.id')
                ->get();
                $respuestas = Foro_respuesta::from('foros_respuestas as fr')
                ->select(
                    'fr.id',
                    'fr.titulo', 
                    'fr.respuesta', 
                    'fr.dni_usuarios',
                    'fr.idEvento', 
                    'u.nombres',
                    'u.apellidoPaterno',

                )
                ->join('usuarios as u', 'fr.dni_usuarios', '=','u.dni')
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
         $idEvento = $request->idEvento;
 

         if ($modal == 'NUEVO') {
           //  dd($id);
            Foro_pregunta::create(Array(
                    'pregunta' => $pregunta,
                    'dni_ponente' => $dni_ponente,
                    'idEvento'=> $idEvento,
            ));
            // $resultado = 'EXITO';
        }else
           if ($modal == 'EDITAR') {
            
             $id = $request->id;
            //  dd($id);
             Foro_pregunta::where('id', $id)
                 ->update([
                     'pregunta' => $pregunta,
                     'dni_ponente' => $dni_ponente,
                     'idEvento'=> $idEvento,
                 ]);
             // $resultado = 'EXITO';
         }
 
         // return redirect()->route('Permisos/permisos_listar');
 
         return redirect()->route('administrativa.foros');
    }
    public function guardar_respuesta(Request $request){
        //  dd($request);
         $modal = $request->modal;
         $x = session()->all();
         $dni_usuario = $x['usuario_dni'];
         $titulo = mb_strtoupper($request->titulo);
         $idEvento = $request->idEvento;
         $respuesta = $request->respuesta;
 
        //  $respuesta_existe = Foro_respuesta::select('id')->where('Foro_respuesta', $dni_usuario)->get();

         if ($modal == 'AGREGAR') {
           //  dd($id);
        //    if()
            Foro_respuesta::create(Array(
                    'titulo' => $titulo,
                    'respuesta' => $respuesta,
                    'dni_usuarios' => $dni_usuario,
                    'idEvento'=> $idEvento,
            ));
            // $resultado = 'EXITO';
        }else
           if ($modal == 'EDITAR') {
            
             $id = $request->id;
            //  if($dni_usuario == Foro_respuesta::where(['dni_usuarios', $dni_usuario])){
            Foro_respuesta::where([['id', $id],['dni_usuarios', $dni_usuario]])
                 ->update([
                    'titulo' => $titulo,
                    'respuesta' => $respuesta,
                    'dni_usuarios' => $dni_usuario,
                    'idEvento'=> $idEvento,
                 ]);
            //  }
             // $resultado = 'EXITO';
         }
 
         // return redirect()->route('Permisos/permisos_listar');
 
         return redirect()->route('usuario.foros');
    }

    public function foros_usuarios2()
    {
        $x = session()->all();
        if (empty($x['usuario_dni'])) {
            $congresos = Congreso::all();
            return view('welcome', array('congresos' => $congresos));
        }else {
            $band = (new PermisosController)->verificarPermiso($x['usuario_dni'], 'FOROS', 'USUARIOS');
            if ($band == 1) {
                
                $preguntas = Foro_pregunta::from('foros_preguntas as fr')
                ->select(
                    'fr.id',
                    'fr.pregunta', 
                    'fr.dni_ponente',
                    'fr.idEvento',
                    'e.nombre as nombreConferencia',
                    'po.nombre',
                    'po.apellidoPaterno',
                )
                ->join('ponentes as po', 'fr.dni_ponente','=','po.dni')
                ->join('eventos as e', 'fr.idEvento','=','e.id')
                ->get();
                $respuestas = Foro_respuesta::from('foros_respuestas as fr')
                ->select(
                    'fr.id',
                    'fr.titulo', 
                    'fr.respuesta', 
                    'fr.dni_usuarios',
                    'fr.idEvento', 
                    'u.nombres',
                    'u.apellidoPaterno',

                )
                ->join('usuarios as u', 'fr.dni_usuarios', '=','u.dni')
                ->get();
                return Inertia::render('Usuarios/usuarios_foros2', [
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
}
