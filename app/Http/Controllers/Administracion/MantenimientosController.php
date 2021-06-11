<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Http\Controllers\IndexController;

use App\Models\Permisos\Permiso;
use App\Models\Permisos\Permisos_Usuario;
use App\Models\Administrativa\Ponente;
use App\Models\Categoria;

use Illuminate\Http\Request;
use Inertia\Inertia;

class MantenimientosController extends Controller{
    public function Categorias(){
        $x = session()->all();
        if (empty($x['usuario_dni'])) {
            return view('welcome');
        }else {
            $band = (new PermisosController)->verificarPermiso($x['usuario_dni'], 'LISTAR CATEGORIAS', 'GESTIÓN ADMINISTRATIVA');
            if ($band == 1) {
                $categorias = Categoria::from('categorias as c')
                ->select(
                    'c.id',
                    'c.nombre'
                )
                ->get();           
                return Inertia::render('Administrativa/categorias_mantenimiento', [
                    'categorias' => $categorias,
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