<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Http\Controllers\IndexController;

use App\Models\Permisos\Permiso;
use App\Models\Permisos\Permisos_Usuario;
use App\Models\Administrativa\Ponente;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PonentesController extends Controller
{
    public function Ponentes(){
        $x = session()->all();
        if (empty($x['usuario_dni'])) {
            return view('welcome');
        }else {
            $band = (new PermisosController)->verificarPermiso($x['usuario_dni'], 'LISTAR PONENTES', 'GESTIÓN ADMINISTRATIVA');
            if ($band == 1) {
                $ponentes = Ponente::from('ponentes as p')
                ->select(
                    'id',
                    'nombre', 
                    'apellidoPaterno',
                    'apellidoMaterno',
                    'email',
                    'dni',
                    'descripcion'
                )
                ->get();
                
                return Inertia::render('Administrativa/ponentes_admin', [
                    'ponentes' => $ponentes,
                    // 'respuestas' => $respuestas,
                ]);
            } else {
                $mensaje = 'RECHAZADO';
                return (new IndexController)->home($mensaje);
                die();
            }
        } 
    }

    public function verificarPonente(Request $request)
    {
        
        $modal = $request->modal;
        $dni = $request->dni;
        $email = $request->email;

        $existe_dni = Ponente::select('dni')->where('dni', $dni)->get();
        $existe_usuario = Ponente::select('email')->where('email', $email)->get();

        if ($modal == 'EDITAR') {

            $existe_usuario = Ponente::select('email')->where('email', $email)->get();

            if (count($existe_usuario) != 0) {
            }
            if (count($existe_usuario) == 0) {
                return "CORRECTO";
            } else {
                if ($existe_usuario[0]['email'] == $email) {
                    return "CORRECTO";
                } else {
                    return "INCORRECTO_U";
                }
            }
        } else
         if ($modal == 'NUEVO') {

            $existe_dni = Ponente::select('dni')->where('dni', $dni)->get();
            $existe_usuario = Ponente::select('email')->where('email', $email)->get();

            if (count($existe_dni) == 0) {
                if (count($existe_usuario) == 0) {
                    return 'CORRECTO';
                } else {
                    return 'INCORRECTO_U';
                }
            } else {
                return 'INCORRECTO_D';
            }
        }
    }
    public function guardarPonente(Request $request)
    {

        $modal = $request->modal;
        $dni = $request->dni;
        $nombre = mb_strtolower($request->nombre);
        $apellidoPaterno = mb_strtolower($request->apellidoPaterno);
        $apellidoMaterno = mb_strtolower($request->apellidoMaterno);
        $email = $request->email;
        $clave = $request->clave;
        $telefono = $request->telefonos;
        $x = session()->all();
        $usuario_registro = $x['usuario_dni'];
        $resultado = 'ERROR';

        if ($modal == 'NUEVO') {
            $clave = Hash::make($dni);
            Ponente::create(array(
                'dni' => $dni,
                'clave' => $clave,
                'nombre' => $nombre,
                'apellidoPaterno' => $apellidoPaterno,
                'apellidoMaterno' => $apellidoMaterno,
                'telefono' => $telefono,
                'email' => $email,
                'usuario_creacion' => $usuario_registro
            ));
            Permisos_Usuario::create([
                'dni' =>$dni,
                'id_permiso' => 1,
            ]);
            Permisos_Usuario::create([
                'dni' =>$dni,
                'id_permiso' => 2,
            ]);
            Permisos_Usuario::create([
                'dni' =>$dni,
                'id_permiso' => 3,
            ]);
            Permisos_Usuario::create([
                'dni' =>$dni,
                'id_permiso' => 4,
            ]);
            Permisos_Usuario::create([
                'dni' =>$dni,
                'id_permiso' => 5,
            ]);

            $resultado = 'EXITO';
        } else 
        if ($modal == 'EDITAR') {
            Ponente::where('dni', $dni)
            ->update([
                'nombre' => $nombre,
                'apellidoPaterno' => $apellidoPaterno,
                'apellidoMaterno' => $apellidoMaterno,
                'email' => $email,
                'usuario_actualizacion' => $usuario_registro
            ]);
            $resultado = 'EXITO';
        }

        return $resultado;
    }


}