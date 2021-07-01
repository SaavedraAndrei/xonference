<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Http\Controllers\IndexController;

use App\Models\Permisos\Permiso;
use App\Models\Permisos\Permisos_Usuario;
use App\Models\Administrativa\Ponente;
use App\Models\Categoria;
use App\Models\Congreso;

use Illuminate\Http\Request;
use Inertia\Inertia;

class MantenimientosController extends Controller{
    public function Categorias(){
        $x = session()->all();
        if (empty($x['usuario_dni'])) {
            $congresos = Congreso::all();
            return view('welcome', array('congresos' => $congresos));
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

    public function guardar_categoria(Request $request){
        //  dd($request);
         $modal = $request->modal;
         $id = $request->id;
         $nombre = $request->nombre;
         $x = session()->all();
         $usuario_registro = $x['usuario_dni'];
 
         if ($modal == 'NUEVO') {
            Categoria::create(array(
                 'nombre' => $nombre,
             ));
         } else 
         if ($modal == 'EDITAR') {
            Categoria::where('id', $id)
             ->update([
                 'nombre' => $nombre,
             ]);
         }
 
         return redirect()->route('administrativa.categorias');
    }
}