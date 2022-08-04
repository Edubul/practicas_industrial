<?php

namespace App\Http\Controllers;

use App\Models\Evidencias;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class EvidenciasController extends Controller
{
    public function create()
    {
        return Inertia::render('Practicas/SubirArchivo', []);
    }

    public function store()
    {
        if (Request::hasFile('evidencia')) {
            $evidencia = Request::file('evidencia');
            $fileName = $evidencia->getClientOriginalName();
            $fileExists = Evidencias::where('nombre', $fileName)->exists();

            if ($fileExists)
                return Redirect::back()->with('error', 'Ya existe este archivo.');


            $evidencia->move(public_path() . '/evidencias/', $fileName);
            Evidencias::create([
                'nombre' => $fileName,
                'url' => '/evidencias/' . $fileName,
            ]);
            return Redirect::back()->with('success', 'Archivo subido correctamente');
        }
    }
}
