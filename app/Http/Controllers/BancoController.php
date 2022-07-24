<?php

namespace App\Http\Controllers;

use App\Models\Archivos;
use Inertia\Inertia;
use Illuminate\Support\Facades\Request;

class BancoController extends Controller
{
    public function index()
    {
        $archivos_aprobados = Archivos::where('aprobado', '=', 'false')
            ->filter(Request::only('q'))
            ->get();
        // ->paginate(10)


        return Inertia::render('Panel/BancoPracticas', ['archivos' => $archivos_aprobados]);
    }
}
