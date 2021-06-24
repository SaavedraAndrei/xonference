<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Http\Controllers\IndexController;

use App\Models\Permisos\Permiso;
use App\Models\Permisos\Permisos_Usuario;
use App\Models\Administrativa\Ponente;
use App\Models\Evento;
use App\Models\Congreso;
use App\Models\Categoria;

use Illuminate\Http\Request;
use Inertia\Inertia;

class CongresosController extends Controller{
    public function Congresos(){
        $x = session()->all();
        if (empty($x['usuario_dni'])) {
            $congresos = Congreso::all();
            return view('welcome', array('congresos' => $congresos));
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
                
                $ponentes=Ponente::from('ponentes as po')
                ->select(
                    'po.id',
                    'po.nombre',
                    'po.apellidoPaterno',
                    'po.apellidoMaterno',
                    )
                ->get();

                $categorias = Categoria::from('categorias as c')
                ->select(
                    'c.id',
                    'c.nombre',
                )
                ->get();
                return Inertia::render('Administrativa/congresos_permisos', [
                    'congresos' => $congresos,
                    'ponentes' => $ponentes,
                    'categorias' => $categorias,
                ]);
            } else {
                $mensaje = 'RECHAZADO';
                return (new IndexController)->home($mensaje);
                die();
            }
        } 
    }
}