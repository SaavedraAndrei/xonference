<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class RegistrarController extends Controller
{
    public function Registrar(){
        return view('register');
    }

    public function store(Request $request){

        $this->validate($request, [
            'nombres' => 'required|max:255', 
            'apellidoPaterno' => 'required|max:255', 
            'apellidoPaterno' => 'required|max:255', 
            'email' => 'required|email|max:255', 
            'password' => 'required|confirmed', 
        ]);

        Usuario::create([

            'nombres' => $request->nombres,
            'apellidoPaterno' => $request->apellidoPaterno, 
            'apellidoPaterno' => $request->apellidoMaterno,
            'email' =>$request->email,
            'password' => Hash::make($request->password),
        ]);
    
    }
}
