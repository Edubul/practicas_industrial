<?php

namespace App\Http\Controllers;

use App\Http\Requests\CitasRequest;
use App\Models\Cita;
use App\Models\Horarios;
use App\Models\Practica;
use App\Models\Talleres;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class CalendarioController extends Controller
{

    public function index()
    {
        $talleres = Talleres::all();


        $citas = Cita::select('citas.user_id', 'citas.taller_id', 'citas.horario_id', 'citas.fecha', 'users.name', 'users.last_name')
            ->join('users', 'users.id', '=', 'citas.user_id')
            ->where('citas.taller_id', '=', Request::only('taller_id'))
            ->get();

        $horarios = Horarios::all();
        $fecha = Request::only('fecha');

        $horariosOcupados = Cita::select('citas.horario_id')
            ->where('citas.taller_id', '=', Request::only('taller_id'))
            ->where('citas.fecha', '=', ($fecha ? Carbon::createFromFormat('d/m/Y', $fecha['fecha'])->format('Y/m/d') : Carbon::now()->format('Y/m/d')))
            ->get();
        // dd(Request::all());
        return Inertia::render('Panel/Calendario', [
            'talleres' => $talleres,
            'citas' => $citas,
            'horarios' => $horarios,
            'horariosOcupados' => $horariosOcupados,
        ]);
    }

    public function store(CitasRequest $request)
    {
        $validated = $request->validated();
        $newDate = Carbon::createFromFormat('d/m/Y', $request['fecha'])->format('Y-m-d');
        $select = Cita::where('horario_id', '=', $request['horario'])
            ->where('taller_id', '=', $request['taller'])
            ->where('fecha', '=', $newDate)
            ->get();

        if ($newDate <= Carbon::now()->format('Y-m-d')) {
            return Redirect::back()->withErrors(['La fecha debe ser mayor a la actual. (Anticipa tus citas un día antes)']);
        }

        if ($validated && $select->count() == 0) {

            Cita::create([
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
}