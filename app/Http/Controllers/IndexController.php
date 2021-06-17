<?php


namespace App\Http\Controllers;
/*
se indica la ruta a los 'models', de los cuales se obtiene la conexion con la base de datos
y asi tambien los datos de las tablas
*/

use App\Models\Usuario;
use App\Models\Administrativa\Ponente;
/*
El 'request' trae los datos de la vista al controlador
para que asi podamos insertar o hacer disversas consultas 
con las tablas de la base de datos
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Congreso;
use Illuminate\Support\Facades\View;
//-----------------------
/*
Nos permite enrutar facilmente plantillas o interfaces de Vue.js
*/
use Inertia\Inertia;

class IndexController extends Controller
{
    public function Welcome()
    {
        $congresos = Congreso::all();
        session()->forget('usuario_dni');
        session()->forget('email');
        session()->forget('clave');
        session()->forget('nombres');
        return view('welcome', array('congresos' => $congresos));
    }

    public function Login()
    {
        return view('login');
    }

    public function invitados()
    {
        $ponentes = DB::table('ponentes')->get();

        return view('invitados', compact('ponentes'));
    }

    public function Home($mensaje = "ACEPTADO")
    {
        $x = session()->all();
        $dni_registrado = Session::get('dni_registrado');
        
        $existe_usuario = Usuario::select('dni')->where('dni', $dni_registrado)->get();
        $existe_ponente = Ponente::select('dni')->where('dni', $dni_registrado)->get();
        // dd(count($existe_ponente));
        if(count($existe_usuario) == 1){
            $pagado = Usuario::select('pagado')->where('dni', $dni_registrado)->get();
           
            if (empty($x['email'])) {
                //cambiar el return para segurar el ingresp por login
                return view('login');
            } else {
                // $version = DB::select("SELECT * FROM versiones ORDER by id_version DESC LIMIT 1");
                // return view('home')->with('mensaje', $mensaje);
                return View::make('home', array('mensaje' => $mensaje, 'pagado' => $pagado));
            }
        }else if(count($existe_ponente) == 1){
            $pagado = Ponente::select('pagado')->where('dni', $dni_registrado)->get();

            if (empty($x['email'])) {
                //cambiar el return para segurar el ingresp por login
                return view('login');
            } else {
                
                // $version = DB::select("SELECT * FROM versiones ORDER by id_version DESC LIMIT 1");
                // return view('home')->with('mensaje', $mensaje);
                return View::make('home', array('mensaje' => $mensaje, 'pagado' => $pagado));
            }
        }     
       


        
    }

    public function cerrar_sesion()
    {
        session()->forget('usuario_dni');
        session()->forget('email');
        session()->forget('clave');
        session()->forget('nombres');
        return redirect('/login');
    }
    public function validarUsuario(Request $request)
    {
        $email = $request->email;
        $clave = $request->clave;
        $validando_usuario = Usuario::select(
            'email',
            'clave',
            'nombres',
            'dni',
            'apellidoPaterno',
            'apellidoMaterno',
        )
            ->where('email', $email)
            ->get();

        $validando_ponente = Ponente::select(
                'email',
                'clave',
                'nombre',
                'dni',
                'apellidoPaterno',
                'apellidoMaterno',
            )
                ->where('email', $email)
                ->get();

        if (count($validando_usuario) == 1) {
            if (Hash::check($clave, $validando_usuario[0]['clave'])) {
                // dd("ingreso");
                $usuario_encontrado = $validando_usuario[0];
                $dni = $usuario_encontrado['dni'];
                $nombres = $usuario_encontrado['nombres'] . " " . $usuario_encontrado['apellidoPaterno'] . " " . $usuario_encontrado['apellidoMaterno'];
                $email = $usuario_encontrado['email'];
                $clave = $usuario_encontrado['clave'];
                session(['usuario_dni' => $dni]);
                session(['nombres' => $nombres]);
                session(['email' => $email]);
                session(['clave' => $clave]);
                Session::put('dni_registrado', $dni);
                Session::put('nombre_usuario', $nombres);
                return redirect('/home');
            } else {
                Session::flash('email_no_valido', 'Contraseña incorrecta, intente nuevamente');
                return redirect('/login');
                exit();
            }
        } else if(count($validando_ponente) == 1){
            if (Hash::check($clave, $validando_ponente[0]['clave'])) {
                // dd("ingreso");
                $usuario_encontrado = $validando_ponente[0];
                $dni = $usuario_encontrado['dni'];
                $nombres = $usuario_encontrado['nombre'] . " " . $usuario_encontrado['apellidoPaterno'] . " " . $usuario_encontrado['apellidoMaterno'];
                $email = $usuario_encontrado['email'];
                $clave = $usuario_encontrado['clave'];
                // dd($usuario_encontrado);
                session(['usuario_dni' => $dni]);
                session(['nombres' => $nombres]);
                session(['email' => $email]);
                session(['clave' => $clave]);
                Session::put('dni_registrado', $dni);
                Session::put('nombre_usuario', $nombres);
                return redirect('/home');
            } else {
                Session::flash('email_no_valido', 'Contraseña incorrecta, intente nuevamente');
                return redirect('/login');
                exit();
            }
        }else{
            Session::flash('email_no_valido', 'Usuario incorrecto, intente nuevamente');
            return redirect('/login');
            exit();
        }
    }
    // -----------------------------------APIS-----------------------------------

    public function changepass()
    {
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
