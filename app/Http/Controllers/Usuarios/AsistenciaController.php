<?php
/*
Se crea un espacio en la maquina, para usar este controlador
*/
namespace App\Http\Controllers\Usuarios;
/*
- la siguiente ruta, nos conecta con el controlador 'controller'
con el cual podemos usar la extension controller
que a su vez convierte a este acrchivo, en un controlador
*/
use App\Http\Controllers\Controller;
/*
El 'request' trae los datos de la vista al controlador
para que asi podamos insertar o hacer disversas consultas 
con las tablas de la base de datos
*/
use Illuminate\Http\Request;
/*
se indica la ruta a los 'models', de los cuales se obtiene la conexion con la base de datos
y asi tambien los datos de las tablas
*/
use App\Models\Usuario;
/*
Nos permite enrutar facilmente plantillas o interfaces de Vue.js
*/
use Inertia\Inertia;


class AsistenciaController extends Controller
{
    public function asistencia_usuarios()
    {
        return Inertia::render('Usuarios/asistencia_usuarios');
    }
}
