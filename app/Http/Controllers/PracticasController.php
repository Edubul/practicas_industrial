<?php

namespace App\Http\Controllers;

use App\Http\Requests\PracticasRequest;
use App\Models\Horarios;
use App\Models\Practica;
use App\Models\Talleres;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;

use Inertia\Inertia;

class PracticasController extends Controller
{
    public function index()
    {
        return Inertia::render('Panel/Index', []);
    }

    public function store(PracticasRequest $request)
    {
        $validated = $request->validated();
        $newDate = Carbon::createFromFormat('d/m/Y', $request['fecha'])->format('Y-m-d');
        $select = Practica::where('horario_id', '=', $request['horario'])
            ->where('taller_id', '=', $request['taller'])
            ->where('fecha', '=', $newDate)
            ->get();

        if ($newDate <= Carbon::now()->format('Y-m-d')) {
            return Redirect::back()->withErrors(['La fecha debe ser mayor a la actual. (Anticipa tus practicas un día antes)']);
        }

        if ($validated && $select->count() == 0) {

            Practica::create([
                'user_id' => Auth::user()->id,
                'taller_id' => $request['taller'],
                'horario_id' => $request['horario'],
                'fecha' => $newDate,
            ]);

            return Redirect::back()->with('success', 'Practica agregada correctamente');
        } else {
            return Redirect::back()->withErrors(['error' => 'El horario ya esta ocupado']);
        }
    }

    public function cita()
    {
        $talleres = Talleres::all();


        $practicas = Practica::select('practicas.user_id', 'practicas.taller_id', 'practicas.horario_id', 'practicas.fecha', 'users.name', 'users.last_name')
            ->join('users', 'users.id', '=', 'practicas.user_id')
            ->where('practicas.taller_id', '=', Request::only('taller_id'))
            ->get();

        $horarios = Horarios::all();
        $fecha = Request::only('fecha');

        $horariosOcupados = Practica::select('practicas.horario_id')
            ->where('practicas.taller_id', '=', Request::only('taller_id'))
            ->where('practicas.fecha', '=', ($fecha ? Carbon::createFromFormat('d/m/Y', $fecha['fecha'])->format('Y/m/d') : Carbon::now()->format('Y/m/d')))
            ->get();
        // dd(Request::all());
        return Inertia::render('Panel/Calendario', [
            'talleres' => $talleres,
            'practicas' => $practicas,
            'horarios' => $horarios,
            'horariosOcupados' => $horariosOcupados,
        ]);
    }
}
