<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Http\Controllers\IndexController;

use App\Models\Permisos\Permiso;
use App\Models\Permisos\Permisos_Usuario;
use App\Models\Administrativa\Ponente;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PonentesController extends Controller
{
    public function Ponentes(){
        $x = session()->all();
        if (empty($x['usuario_dni'])) {
            return view('welcome');
        }else {
            $band = (new PermisosController)->verificarPermiso($x['usuario_dni'], 'PONENTES', 'GESTIÓN ADMINISTRATIVA');
            if ($band == 1) {
                $ponentes = Ponente::from('ponentes as p')
                ->select(
                    'id',
                    'nombre', 
                    'apellidoPaterno',
                    'apellidoMaterno',
                    'email',
                    'dni',
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
}