<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\Usuario;


class RegistrarController extends Controller
{
    public function Registrar()
    {
        return view('register');
    }

    public function verificar_usuario(Request $request)
    {

        $dni = $request->dni;
        $email = $request->email;

        $existe_dni = Usuario::select('dni')->where('dni', $dni)->get();
        $existe_email = Usuario::select('email')->where('email', $email)->get();
        $existe_usuario = Session::flash('dni_existente', 'usuario existente, usted ya esta registrado, inicie sesion');

        if (count($existe_dni) == 0) {
            if (count($existe_email) == 0) {
                // return 'CORRECTO';
                return redirect('/register');
            } else {
                // return 'INCORRECTO_U';
                Session::flash('dni_existente', 'usuario existente, usted ya esta registrado, inicie sesion');
                return redirect('/registrar');
                exit();
            }
        } else {
            // return 'INCORRECTO_D';
            Session::flash('dni_existente', 'usuario existente, usted ya esta registrado, inicie sesion');
            return redirect('/registrar');
            exit();
        }
    }

    public function guardar_usuario(Request $request)
    {
        
        $x = session()->all();
        $dni = $request->dni;
        $nombres = $request->nombres;
        $apellidoPaterno = $request->apellidoPaterno;
        $apellidoMaterno = $request->apellidoMaterno;
        $email = $request->email;
        $clave = Hash::make($request->clave);
        Usuario::create(Array(
            'nombres' => $nombres,
            'apellidoPaterno' => $apellidoPaterno, 
            'apellidoMaterno' => $apellidoMaterno,
            'dni'=>$dni,
            'email' =>$email,
            'clave' => $clave,
        ));
        return redirect('/login');
    }
}
