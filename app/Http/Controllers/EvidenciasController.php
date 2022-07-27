<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class EvidenciasController extends Controller
{
    public function create()
    {
        return Inertia::render('Practicas/SubirArchivo', [
            // 'talleres' => Talleres::all(),
            // 'horarios' => Horarios::all(),
        ]);
    }
}
