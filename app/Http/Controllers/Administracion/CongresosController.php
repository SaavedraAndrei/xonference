<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Http\Controllers\IndexController;

use App\Models\Permisos\Permiso;
use App\Models\Permisos\Permisos_Usuario;
use App\Models\Administrativa\Ponente;
use App\Models\Evento;

use Illuminate\Http\Request;
use Inertia\Inertia;

class CongresosController extends Controller{
    public function Congresos(){
        $x = session()->all();
        if (empty($x['usuario_dni'])) {
            return view('welcome');
        }else {
            $band = (new PermisosController)->verificarPermiso($x['usuario_dni'], 'PONENTES', 'GESTIÓN ADMINISTRATIVA');
            if ($band == 1) {
                $congresos = Evento::from('eventos as e')
                ->select(
                    'e.id',
                    'e.nombre',
                    'e.tematica', 
                    'e.descripcion',
                    'fecha_evento',
                    'hora_evento',
                    'hora_fin',
                    'idPonente',
                    'idCategoria',
                    'usuario_creacion',
                    'usuario_actualizacion'
                )
                ->get();
                // $ponentes = Ponente::from('ponentes as p')
                // ->select(
                //     'id',
                //     'nombre', 
                //     'apellidoPaterno',
                //     'apellidoMaterno',
                //     'email',
                //     'dni',
                // )
                // ->get();
                
                return Inertia::render('Administrativa/congresos_permisos', [
                    // 'ponentes' => $ponentes,
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