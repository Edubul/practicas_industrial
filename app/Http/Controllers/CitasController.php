<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class CitasController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $citas = Cita::select(['citas.id','users.name','users.last_name','talleres.nombre as taller','horarios.horario','citas.fecha','practicas.materia'])
            ->join('users','citas.user_id','=','users.id')
            ->join('talleres','citas.taller_id','=','talleres.id')
            ->join('horarios','citas.horario_id','=','horarios.id')
            ->join('practicas','citas.practica_id','=','practicas.id')
            ->orderBy('citas.fecha','desc')->paginate(15);
            return Inertia::render('Citas/Index',['citas' => $citas,'user' => $user]);

    }

    public function show($id)
    {
        $cita = Cita::find($id)
            ->select(['citas.id','users.name','users.last_name','citas.fecha','talleres.nombre','practicas.nombre_practica','horarios.horario','practicas.clave_practica'])
            ->join('practicas', 'practicas.id', '=', 'citas.practica_id')
            ->join('users', 'users.id', '=', 'citas.user_id')
            ->join('talleres', 'talleres.id', '=', 'citas.taller_id')
            ->join('horarios', 'horarios.id', '=', 'citas.horario_id')
            ->where('citas.id', '=', $id)
            ->first();
        // dd($cita);
        return Inertia::render('Citas/Edit', [
            'cita' => $cita,
        ]);
    }

    public function destroy($id){
        $cita = Cita::findOrFail($id);
        $cita->delete();

        return Redirect::route('panel')->with('success', 'Cita eliminada correctamente.');
    }

}
