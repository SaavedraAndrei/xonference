<?php

namespace App\Http\Controllers;

use App\Models\Conferencia;
use Illuminate\Http\Request;

class ConferenciaController extends Controller
{
    public function index()
    {
        $conferencia = Conferencia::all();


        return view('calendario', compact('conferencia'));
    }
}
