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
use App\Models\Evento;
use App\Models\Asistencia;
/*
Nos permite enrutar facilmente plantillas o interfaces de Vue.js
*/
use Inertia\Inertia;


class AsistenciaController extends Controller
{
    public function principal()
    {
        return Inertia::render('Usuarios/usuarios_principal');
    }
    public function asistencia_usuarios()
    {
        $datos_fecha = Evento::from('eventos')
            ->select(
                'id',
                'fecha_evento',
                'nombre'
            )
            ->where('id', 3)
            ->get();
        return Inertia::render('Usuarios/usuarios_asistencia',
    [
        'datos_fecha'=>$datos_fecha,
    ]);
    }

    public function verificar_usuario_asistencia(Request $request)
    {
        // dd($request);
        $dni = $request->dni;

        $usuario_existe = Usuario::select('dni')->where('dni', $dni)->get();

        $datos_fecha = Evento::from('eventos')
            ->select(
                'fecha_evento',
                'nombre'
            )
            ->where('id', 3)
            ->get();

        $fecha_evento = date($datos_fecha[0]['fecha_evento']);

        if (count($usuario_existe) == 0) {
            $resultado = 'NO EXISTE';
        } else {

            date_default_timezone_set("America/Lima");
            $fechaNow = date('Y-m-d');
            $hora = (int) date('H');
            $min = (int) date('i');
            $fecha_dia = date('l');

            $hora_form = $hora . ":" . $min . ":00";
            $fecha_actual_hora_min =  strtotime($hora_form);

            $datos_horario = Evento::from('eventos as e')
                ->select(
                    'hora_evento',
                    'hora_fin'
                )
                ->join('usuarios_horarios_asignados as ha', 'e.id', '=', 'ha.id_eventos')
                ->where('ha.dni', $dni)->get();
            // dd($fecha_evento, $fechaNow);
            if ($fechaNow == $fecha_evento) {
                // dd("hoy");
                $salida_hora_min = strtotime($datos_horario[0]['hora_fin']);

                if ($fecha_actual_hora_min < $salida_hora_min) {
                    //---------------------
                    $verificarmarcado = Asistencia::where('dni', $dni)
                        ->where('fecha_hora', 'like', '%' . $fechaNow . '%')
                        ->where('asistio', 1)
                        ->get();
                    if (count($verificarmarcado) != 0) {
                        $resultado = 'SI MARCADO';
                    } else {
                        $resultado = 'NO MARCADO';
                    }
                } else if ($fecha_actual_hora_min > $salida_hora_min) {
                    $resultado = 'FUERA DE HORARIO';
                }
            } else {
                // dd("no enntra");
                $resultado = 'FUERA DE HORARIO';
            }
        }

        // dd($resultado);
        return $resultado;
    }

    public function registrar_asistencia(Request $request)
    {
        // dd($request);
        $conferencia = $request->evento;
        date_default_timezone_set("America/Lima");
        $fechaActual = date('Y-m-d H:i:s');

        // $fechaActual = session('fecha_ingreso');
        $fechaCortaActual = date('Y-m-d');
        $hora = (int) date('H');
        $min = (int) date('i');
        // $fecha_dc = date_create("now");
        $fecha_dia = date('l');
        //---------------------------------------------

        $dni = (int)$request->dni;
        $hora_form = $hora . ":" . $min . ":00";
        $fecha_actual_hora_min =  strtotime($hora_form);
        $datos_horario = Evento::from('eventos as e')
            ->select(
                'hora_evento',
                'hora_fin'
            )
            ->join('usuarios_horarios_asignados as ha', 'e.id', '=', 'ha.id_eventos')
            ->where('ha.dni', $dni)->get();

        Asistencia::create(
            array(
                'fecha_hora' => $fechaActual,
                'asistio' => 1,
                'tipo' => 'ingresó',
                'dni' => $dni,
                'id_conferencia'=>$conferencia,
                // 'hora_salida' => $nueva_fecha_hora_salida
            )
        );

        return redirect()->route('usuario.asistencia');
    }
}
