<?php

namespace App\Http\Controllers;
use Inertia\Inertia;

class IndexController extends Controller
{
    public function Index(){
        return Inertia::render('index');
    }
}