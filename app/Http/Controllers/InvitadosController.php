<?php

namespace App\Http\Controllers;
use Inertia\Inertia;

class InvitadosController extends Controller
{
    public function Principal(){
        return Inertia::render('invitados');
    }
}