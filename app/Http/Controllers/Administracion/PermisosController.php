<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Http\Controllers\IndexController;

use App\Models\Permisos\Permiso;
use App\Models\Permisos\Permisos_Usuario;
use App\Models\Congreso;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PermisosController extends Controller
{
    // --------------------FUNCIÓN PARA VERIFICAR PERMISO-----------------------
    public function verificarPermiso($dni, $modulo, $area)
    {
        $band = 0;

        $id_permiso = Permiso::select('id')->where('modulo', $modulo)->where('area', $area)->get();
        
        $result = Permisos_Usuario::select('id')
            ->where('permisos_usuarios.id_permiso', $id_permiso[0]['id'])
            ->where('permisos_usuarios.dni', $dni)
            ->get();

        if (empty($result[0]['id'])) {
            $band = 0;
        } else {
            $band = 1;
        }

        return $band;
    }

    public function principal(){
        $x = session()->all();
        $congresos = Congreso::all();
        if (empty($x['usuario_dni'])) {
            $congresos = Congreso::all();
            return view('welcome', array('congresos' => $congresos));
        }else {
            $band = (new PermisosController)->verificarPermiso($x['usuario_dni'], 'GENERAL', 'GESTIÓN ADMINISTRATIVA');
            // dd($band);
            if ($band == 1) {
                return Inertia::render('Administrativa/principal_admin');
            } else {
                $mensaje = 'RECHAZADO';
                return (new IndexController)->home($mensaje);
                die();
            }
        }
    }

    
}
