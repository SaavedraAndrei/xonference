<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Response;

use App\Http\Controllers\Administracion\PermisosController;
use App\Http\Controllers\IndexController;

use App\Models\Congreso;

use Inertia\Inertia;

class ArchivoController extends Controller
{
    public function principal(){
        $x = session()->all();
        if (empty($x['usuario_dni'])) {
            $congresos = Congreso::all();
            return view('welcome', array('congresos' => $congresos));
        }else {
            $band = (new PermisosController)->verificarPermiso($x['usuario_dni'], 'LISTAR RECURSOS', 'GESTIÓN ADMINISTRATIVA');
            if ($band == 1) {
                
                $files = File::from('files as e')
                ->select(
                    'e.id',
                    'e.title',
                    'e.description', 
                    'e.path',
                )
                
                
                ->get();    

                return Inertia::render('Administrativa/recursos_ponentes', [
                    
                    'files' => $files,
                    // 'respuestas' => $respuestas,
                ]);
            } else {
                $mensaje = 'RECHAZADO';
                return (new IndexController)->home($mensaje);
                die();
            }
        } 
    }


    public function verificarRecurso(Request $request)
    {
        $modal = $request->modal;
        $title = $request->title;
        // $email = $request->email;

        $existe_title = File::select('title')->where('title', $title)->get();
        // $existe_usuario = Ponente::select('email')->where('email', $email)->get();

        if ($modal == 'EDITAR') {

            $existe_title = File::select('title')->where('title', $title)->get();

            if (count($existe_title) != 0) {
            }
            if (count($existe_title) == 0) {
                return "CORRECTO";
            } else {
                if ($existe_title[0]['title'] == $title) {
                    return "CORRECTO";
                } else {
                    return "INCORRECTO_U";
                }
            }
        } else
         if ($modal == 'NUEVO') {

            $existe_title = File::select('title')->where('title', $title)->get();

            if (count($existe_title) == 0) {
                return "CORRECTO";
                
            } else {
                return 'INCORRECTO_D';
            }
        }
    }


    public function guardarRecurso(Request $request)
    {

        // dd($request);
        $modal = $request->modal;
        $title = $request->title;
        $description = $request->description;
        // $x = session()->all();
        // $usuario_registro = $x['usuario_dni'];
     

        if ($modal == 'NUEVO') {
            // dd()
            $id_file = File::create(array(
                'title' => $title,
                'description' => $description,
                // 'clave' => $clave,
                // 'usuario_creacion' => $usuario_registro
            ));

            $id_file = $id_file->id;
            
            $path_name = pathinfo($_FILES['archivofile']['name']);
            $extension = "." . $path_name['extension'];
            $nombrearchivo = $title . $extension; 
            // $archivo = $_FILES['archivofile']['tmp_name'];
            $archivo = $_FILES['archivofile']['tmp_name'];
            $ruta = '\recursosstorage';
            // $ruta = $ruta . "/" . $title;
            $ruta = $_SERVER['DOCUMENT_ROOT'] . $ruta . "/" . $nombrearchivo; 
            move_uploaded_file($archivo, $ruta);

            File::where('id', $id_file)
                ->update([
                    'archivofile' =>$nombrearchivo,
                    'path' => $ruta,
                ]);
                // dd($ruta);
        } else 
        if ($modal == 'EDITAR') {
            File::where('title', $title)
            ->update([
                'title' => $title,
                'description' => $description,
                // 'usuario_actualizacion' => $usuario_registro
            ]);
        }

        return redirect()->route('administrativa.recursos');
    }

    //----------------------------------------
    public function index()
    {
        $files = File::orderBy('created_at','DESC')->paginate(30);
        return view('file.index',['files' => $files]);
    }

    public function create()
    {
        return view('file.upload');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|file|max:20000'
        ]);

        $upload = $request->file('file');
        $path = $upload->store('public/recursosstorage');
        $file = file::create([
            'title' => $upload->getClientOriginalName(),
            'description' => '',
            'path' => $path,
        ]);

        return redirect('/file')->with('success','La carga del archivo ha sido existoso');

    }

    public function show($id)
    {
        
        $dl = File::find($id);
        $ruta = public_path().'\recursosstorage'.'/'.$dl->archivofile;
        return Response::download($ruta);
    }

}
