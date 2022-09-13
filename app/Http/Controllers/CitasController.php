<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CitasController extends Controller
{
    public function index()
    {
        $citas = Cita::select(['users.name','users.last_name','talleres.nombre as taller','horarios.horario','citas.fecha','practicas.materia'])
            ->join('users','citas.user_id','=','users.id')
            ->join('talleres','citas.taller_id','=','talleres.id')
            ->join('horarios','citas.horario_id','=','horarios.id')
            ->join('practicas','citas.practica_id','=','practicas.id')->paginate(15);
            return Inertia::render('Citas/Index',['citas' => $citas]);

    }
}
