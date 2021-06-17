<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Http\Controllers\IndexController;

use App\Models\Permisos\Permiso;
use App\Models\Permisos\Permisos_Usuario;
use App\Models\Administrativa\Ponente;
use App\Models\Congreso;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PonentesController extends Controller
{
    public function Ponentes(){
        $x = session()->all();
        if (empty($x['usuario_dni'])) {
            $congresos = Congreso::all();
            return view('welcome', array('congresos' => $congresos));
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
                    'descripcion', 
                    'telefono'
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
        $descripcion = $request->descripcion;
        $nombre = mb_strtolower($request->nombre);
        $apellidoPaterno = mb_strtolower($request->apellidoPaterno);
        $apellidoMaterno = mb_strtolower($request->apellidoMaterno);
        $email = $request->email;
        $clave = $request->dni;
        $telefono = $request->telefono;
        $x = session()->all();
        $usuario_registro = $x['usuario_dni'];
        // $resultado = 'ERROR';

        if ($modal == 'NUEVO') {
            $clave = Hash::make($dni);
            $id_ponente = Ponente::create(array(
                'dni' => $dni,
                'clave' => $clave,
                'nombre' => $nombre,
                'apellidoPaterno' => $apellidoPaterno,
                'apellidoMaterno' => $apellidoMaterno,
                'telefono' => $telefono,
                'descripcion' => $descripcion,
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
            // dd($id_ponente);
            $id_ponente = $id_ponente->id;
            
            $path_name = pathinfo($_FILES['fotoPonente']['name']);
            $extension = "." . $path_name['extension'];
            $nombreimagen = "invitado" . $id_ponente . $extension;
            $archivo = $_FILES['fotoPonente']['tmp_name'];
            $ruta = '\img\ponentes';
            $ruta = $_SERVER['DOCUMENT_ROOT'] . $ruta . "/" . $nombreimagen;
            move_uploaded_file($archivo, $ruta);

            Ponente::where('id', $id_ponente)
                ->update([
                    'fotoPonente' => $nombreimagen,
                ]);
        } else 
        if ($modal == 'EDITAR') {
            Ponente::where('dni', $dni)
            ->update([
                'nombre' => $nombre,
                'apellidoPaterno' => $apellidoPaterno,
                'apellidoMaterno' => $apellidoMaterno,
                'email' => $email,
                'telefono' => $telefono,
                'descripcion' => $descripcion,
                'usuario_actualizacion' => $usuario_registro
            ]);
        }

        return redirect()->route('administrativa.ponentes');
    }


}