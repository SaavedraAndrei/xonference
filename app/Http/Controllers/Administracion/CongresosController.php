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
            $band = (new PermisosController)->verificarPermiso($x['usuario_dni'], 'LISTAR CONGRESOS', 'GESTIÓN ADMINISTRATIVA');
            if ($band == 1) {
                $congresos = Evento::from('eventos as e')
                ->select(
                    'e.id',
                    'e.nombre',
                    'e.tematica', 
                    'e.descripcion',
                    'e.fecha_evento',
                    'e.hora_evento',
                    'e.hora_fin',
                    'e.idPonente',
                    'e.idCategoria',
                    'e.usuario_creacion',
                    'e.usuario_actualizacion',
                    'po.nombre as NOMBRES',
                    'po.apellidoPaterno', 
                    'po.apellidoMaterno',
                    'c.nombre as nombre_categoria'

                )
                ->join('ponentes as po','e.idPonente','=','po.id')
                ->join('categorias as c','e.idCategoria','=','c.id')
                ->get();               
                return Inertia::render('Administrativa/congresos_permisos', [
                    'congresos' => $congresos,
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