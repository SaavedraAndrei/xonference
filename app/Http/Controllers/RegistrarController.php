<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\Usuario;
use App\Models\Permisos\Permisos_Usuario;


class RegistrarController extends Controller
{
    public function Registrar()
    {
        return view('register');
    }

    public function verificar_usuario(Request $request)
    {
        // dd($request);
        $dni = $request->dni;
        $email = $request->email;
        $clave = Hash::make($request->clave);
        $nombres = mb_strtoupper($request->nombres);
        $apellidoPaterno = mb_strtoupper($request->apellidoPaterno);
        $apellidoMaterno = mb_strtoupper($request->apellidoMaterno);

        if ($dni != null) {
            $existe_dni = Usuario::select('dni')->where('dni', $dni)->get();
            if (count($existe_dni) == 0) {
                // dd('no existe dni');
                if ($nombres != null) {
                    // dd('ingresan');
                    if ($apellidoPaterno != null) {
                        if ($apellidoMaterno != null) {
                            if ($email != null) {
                                $existe_email = Usuario::select('email')->where('email', $email)->get();
                                if (count($existe_email) == 0) {
                                    // return redirect('/register');
                                    if ($clave != null) {
                                        Usuario::create(array(
                                            'nombres' => $nombres,
                                            'apellidoPaterno' => $apellidoPaterno,
                                            'apellidoMaterno' => $apellidoMaterno,
                                            'dni' => $dni,
                                            'email' => $email,
                                            'clave' => $clave,
                                        ));


                                        Permisos_Usuario::create(array(
                                            'dni' => $dni,
                                            'id_permiso' => 1,
                                        ));
                                        // Session::put('dni_registrado', $dni);
                                        Session::flash('dni_registrado', 'Usuario registrado');
                                        return redirect('/registrar');
                                        exit();
                                        return view('/login');
                                        // Session::put('dni_registrado', $dni);

                                        // return redirect('/login');
                                    } else {
                                        Session::flash('dni_existente', 'Ingresa tu email');
                                        return redirect('/registrar');
                                        exit();
                                    }
                                } else {
                                    Session::flash('dni_existente', 'usuario existente, usted ya esta registrado, inicie sesion');
                                    return redirect('/registrar');
                                    exit();
                                }
                            } else {
                                Session::flash('dni_existente', 'Ingresa tu email');
                                return redirect('/registrar');
                                exit();
                            }
                        } else {
                            Session::flash('dni_existente', 'Ingresa tu apellido materno');
                            return redirect('/registrar');
                            exit();
                        }
                    } else {
                        Session::flash('dni_existente', 'Ingresa tu apellido paterno');
                        return redirect('/registrar');
                        exit();
                    }
                } else {
                    Session::flash('dni_existente', 'Ingresa tus nombres');
                    return redirect('/registrar');
                    exit();
                }
            } else {
                // dd('si existe');
                Session::flash('dni_existente', 'usuario existente, usted ya esta registrado, solo inicie sesion');
                return redirect('/registrar');
                exit();
            }
        } else {
            // dd('no ingreso');
            Session::flash('dni_existente', 'Ingresa tu DNI');
            return redirect('/registrar');
            exit();
        }
    }

    // public function guardar_usuario(Request $request)
    // {
    //     // dd($request);
    //     $x = session()->all();
    //     $dni = $request->dni;
    //     $nombres = $request->nombres;
    //     $apellidoPaterno = $request->apellidoPaterno;
    //     $apellidoMaterno = $request->apellidoMaterno;
    //     $email = $request->email;
    //     $clave = Hash::make($request->clave);

    //     // if()
    //     Usuario::create(array(
    //         'nombres' => $nombres,
    //         'apellidoPaterno' => $apellidoPaterno,
    //         'apellidoMaterno' => $apellidoMaterno,
    //         'dni' => $dni,
    //         'email' => $email,
    //         'clave' => $clave,
    //     ));

    //     Session::put('dni_registrado', $dni);

    //     return redirect('/login');
    // }
}
