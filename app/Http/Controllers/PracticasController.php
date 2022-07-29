<?php

namespace App\Http\Controllers;

use App\Http\Requests\PracticasRequest;
use App\Models\Archivos;
use App\Models\Horarios;
use App\Models\Materias;
use App\Models\Practica;
use App\Models\Productos;
use App\Models\Talleres;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $equipo_proteccion = Productos::select(['id', 'nombre_producto'])->where('categoria_id', '=', 3)->groupBy('nombre_producto')->orderBy('nombre_producto')->get();
        $herramientas_man = Productos::where('categoria_id', 5)->groupBy('nombre_producto')->orderBy('nombre_producto')->get();
        $herramientas_mec = Productos::where('categoria_id', 6)->groupBy('nombre_producto')->orderBy('nombre_producto')->get();
        $instrumentos_medicion = Productos::select(['id', 'nombre_producto'])->where('categoria_id', '=', 8)->groupBy('nombre_producto')->orderBy('nombre_producto')->get();
        $maquinaria = Productos::where('categoria_id', 11)->groupBy('nombre_producto')->orderBy('nombre_producto')->get();
        $materias = Materias::all();

        // dd($instrumentos_medicion);
        return Inertia::render('Practicas/Create', [
            'user' => Auth::user(),
            'materias' => $materias,
            'equipo_proteccion' => $equipo_proteccion,
            'instrumentos_medicion' => $instrumentos_medicion,
            'herramientas_man' => $herramientas_man,
            'herramientas_mec' => $herramientas_mec,
            'maquinaria' => $maquinaria
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

    public function store(PracticasRequest $request)
    {

        $validate = $request->validated();
        dd($request->all());
        if ($validate) {
            Practica::create([
                'user_id' => Auth::user()->id,
                'profesores' => ($request->profesores == null) ? null : $request->profesores,
                'materia' => $request->materia,
                'unidad' => $request->unidad,
                'tema' => $request->tema,
                'nombre_practica' => $request->nombre_practica,
                'atributo_egreso' => $request->atributo_egreso,
                'req_ub_op1' => $request->req_ub_op1,
                'req_ub_op2' => $request->req_ub_op2,
                'equipo_prot' => serialize($request->equipo_prot),
                'maq_usar' => serialize($request->maq_usar),
                'inst_med' => serialize($request->inst_med),
                'material_didactico' => $request->material_didactico,
                'herr_man' => serialize($request->herr_man),
                'herr_mec' => serialize($request->herr_mec),
                'recom_seguridad' => $request->recom_seguridad,
                'objetivo' => $request->objetivo,
                'pasos' => $request->pasos,
                'fuentes_info' => $request->fuentes_info,
            ]);
            return Redirect::back()->with('success', 'Practica agregada correctamente');
        }
    }
}
