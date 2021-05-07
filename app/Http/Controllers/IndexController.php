<?php


namespace App\Http\Controllers;

use App\Models\Usuario;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class IndexController extends Controller
{
    public function Welcome()
    {
        session()->forget('email');
        session()->forget('usuario_clave');
        session()->forget('nombres');
        return view('welcome');
    }

    public function Login()
    {
        return view('login');
    }
    
    public function index()
    {
        return Inertia::render('index');
    }

    public function Home($mensaje = "ACEPTADO")
    {
        $x = session()->all();

        if (empty($x['usuario_clave'])) {
            //cambiar el return para segurar el ingresp por login
            return view('home');
        } else {
            // $version = DB::select("SELECT * FROM versiones ORDER by id_version DESC LIMIT 1");
            return view('home')->with('mensaje', $mensaje);;
        }
    }

    public function cerrar_sesion()
    {
        session()->forget('email');
        session()->forget('usuario_clave');
        session()->forget('nombres');
        return redirect('/login');
    }
    public function validarUsuario(Request $request)
    {
        // dd($request);
        // return $request;
        $email = $request->email;
        $clave = $request->clave;
        $validando_usuario = Usuario::select(
            'email',
            'clave',
            'nombres',
            'apellidoPaterno',
            'apellidoMaterno',
        )
            ->where('email', $email)->get();
            

        if (count($validando_usuario) == 1) {
            
            // if (Hash::check($clave, $validando_usuario[0]['clave'])) {
            //     $usuario_encontrado = $validando_usuario[0];
            //     dd($usuario_encontrado);
            //     $nombres = $usuario_encontrado['nombres'] . " " . $usuario_encontrado['apellidoPaterno'] . " " . $usuario_encontrado['apellidoMaterno'];
            //     $email = $usuario_encontrado['email'];
            //     $clave = $usuario_encontrado['clave'];
            //     session(['nombres' => $nombres]);
            //     session(['email' => $email]);
            //     session(['usuario_clave' => $clave]);

                return redirect('/home');
            // } else {
            //     Session::flash('usuario_no_valido', 'Contraseña incorrecta, intente nuevamente');
            //     return redirect('/login');
            //     exit();
            // }
        } else {
            Session::flash('usuario_no_valido', 'Usuario incorrecto, intente nuevamente');
            return redirect('/login');
            exit();
        }
    }


    


    // -----------------------------------APIS-----------------------------------

    public function changepass()
    {
        // $datos=  $request->except('_token');
        // $dni= $datos['dni'];
        // $newPass=$datos['dni'];
        // $passwordencryp = Hash::make($newPass);

        // DB::table('usuarios')
        //             ->where('dni', $dni)
        //             ->update(['clave' => $passwordencryp]);
        // return redirect('/usuarios_gestion');

        $usuarios = DB::select('SELECT usuarios.clave FROM usuarios');

        foreach ($usuarios as $value) {
            $newPass = $value->clave;
            $passwordencryp = Hash::make($newPass);
            DB::table('usuarios')
                ->where('clave', $value->clave)
                ->update(['clave' => $passwordencryp]);
        }

        return redirect('/index');
    }
    // --------------------------------------------------------------------------

}
