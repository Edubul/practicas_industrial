<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use App\Models\Evidencias;


class EvidenciasController extends Controller
{
    public function index()
    {
        $citas = Cita::select(['citas.id','users.name','users.last_name','talleres.nombre as taller','horarios.horario','citas.fecha','practicas.materia'])
            ->join('users','citas.user_id','=','users.id')
            ->join('talleres','citas.taller_id','=','talleres.id')
            ->join('horarios','citas.horario_id','=','horarios.id')
            ->join('practicas','citas.practica_id','=','practicas.id')
            ->orderBy('citas.fecha','desc')
            ->paginate(15);
            
        return Inertia::render('Evidencias/Index', ['citas' => $citas,]);
    }

    public function store()
    {
        if (Request::hasFile('evidencia')) {
            $evidencia = Request::file('evidencia');
            $fileName = $evidencia->getClientOriginalName();
            $fileExists = Evidencias::where('nombre', $fileName)->exists();
            $cita_id = Request::only('cita_id');
            if ($fileExists)
                return Redirect::back()->with('error', 'Ya existe este archivo.');


            $evidencia->move(public_path() . '/evidencias/', $fileName);
            Evidencias::create([
                'cita_id' => $cita_id['cita_id'],
                'nombre' => $fileName,
                'url' => '/evidencias/' . $fileName,
            ]);
            return Redirect::back()->with('success', 'Archivo subido correctamente');
        }
    }

    public function list()
    {
        $citas = Cita::select(['citas.id','users.name','users.last_name','talleres.nombre as taller','horarios.horario','citas.fecha','practicas.materia','evidencias.*'])
            ->join('users','citas.user_id','=','users.id')
            ->join('talleres','citas.taller_id','=','talleres.id')
            ->join('horarios','citas.horario_id','=','horarios.id')
            ->join('practicas','citas.practica_id','=','practicas.id')
            ->join('evidencias','citas.id','=','evidencias.cita_id')
            ->orderBy('citas.fecha','desc')
            ->paginate(15);
            
            return Inertia::render('Evidencias/List', ['citas' => $citas]);
        }
}
