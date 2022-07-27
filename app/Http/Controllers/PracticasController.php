<?php

namespace App\Http\Controllers;

use App\Http\Requests\PracticasRequest;
use App\Models\Archivos;
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



    public function create()
    {
        return Inertia::render('Practicas/Create', [
            // 'talleres' => Talleres::all(),
            // 'horarios' => Horarios::all(),
        ]);
    }

    public function banco()
    {
        // dd(Request::all());
        $archivos_aprobados = Archivos::where('aprobado', '=', 'false')
            ->filter(Request::only('q'))
            ->get();
        // ->paginate(10)


        return Inertia::render('Panel/BancoPracticas', ['archivos' => $archivos_aprobados]);
    }
}
