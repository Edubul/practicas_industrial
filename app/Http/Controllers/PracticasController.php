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
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class PracticasController extends Controller
{
    public function index()
    {
        $practicas = Practica::select(['users.name', 'users.last_name', 'practicas.id', 'profesores', 'status', 'materia', 'materias_integradoras', 'tema', 'atributo_egreso'])
        ->join('users', 'users.id', '=', 'practicas.user_id')
        ->paginate(15);

        return Inertia::render('Practicas/Index', [
            'practicas' => $practicas,
        ]);
    }


    public function edit($id)
    {
        $user_id = Practica::find($id)->user_id;
        $practicas_edit = Practica::find($id);
        $profesores = User::where('role', '=', 'profesor')->orderBy('last_name')->get();
        $titular = User::select(['name', 'last_name'])->where('id', '=', $user_id)->first();
        $maquinaria = Productos::where('categoria_id', 11)->groupBy('nombre_producto')->orderBy('nombre_producto')->get();
        $herramientas_man = Productos::where('categoria_id', 5)->groupBy('nombre_producto')->orderBy('nombre_producto')->get();
        $herramientas_mec = Productos::where('categoria_id', 6)->groupBy('nombre_producto')->orderBy('nombre_producto')->get();
        $equipo_proteccion = Productos::select(['id', 'nombre_producto'])->where('categoria_id', '=', 3)->groupBy('nombre_producto')->orderBy('nombre_producto')->get();
        $instrumentos_medicion = Productos::select(['id', 'nombre_producto'])->where('categoria_id', '=', 8)->groupBy('nombre_producto')->orderBy('nombre_producto')->get();
        $materias = Materias::all();
        $req_ub = Talleres::select(['*'])->orderBy('nombre')->get();

        $materias_integradoras = Practica::find($id)->materias_integradoras;
        $profesores_array = Practica::select('profesores')->where('id', '=', $id)->get();
        $herramientas_man_array = Practica::select('herr_man')->where('id', '=', $id)->get();
        $maquinaria_array = Practica::select('maq_usar')->where('id', '=', $id)->get();
        $inst_med_array = Practica::select('inst_med')->where('id', '=', $id)->get();
        $equipo_prot_array = Practica::select('equipo_prot')->where('id', '=', $id)->get();
        $material_apoyo = Practica::select('material_apoyo')->where('id', '=', $id)->get();
        return Inertia::render('Practicas/Edit', [
            'materias' => $materias,
            'equipo_proteccion' => $equipo_proteccion,
            'instrumentos_medicion' => $instrumentos_medicion,
            'herramientas_man' => $herramientas_man,
            'herramientas_mec' => $herramientas_mec,
            'maquinaria' => $maquinaria,
            'profesores' => $profesores,
            'practicas' => $practicas_edit,
            'materias_integradoras' => (isset($materias_integradoras) ? unserialize($materias_integradoras) : null),
            'profesores_array' => (isset($profesores_array[0]->profesores) ? unserialize($profesores_array[0]->profesores) : null),
            'herramientas_man_array' => (isset($herramientas_man_array[0]->herr_man) ? unserialize($herramientas_man_array[0]->herr_man) : null),
            'inst_med_array' => (isset($inst_med_array[0]->inst_med) ? unserialize($inst_med_array[0]->inst_med) : null),
            'maquinaria_array' => (isset($maquinaria_array[0]->maq_usar) ? unserialize($maquinaria_array[0]->maq_usar) : null),
            'equipo_prot_array' => (isset($equipo_prot_array[0]->equipo_prot) ? unserialize($equipo_prot_array[0]->equipo_prot) : null),
            'titular' => $titular,
            'material_apoyo' => $material_apoyo,
            'req_ub' => $req_ub,
        ]);
    }

    public function create()
    {
        $equipo_proteccion = Productos::select(['id', 'nombre_producto'])->where('categoria_id', '=', 3)->groupBy('nombre_producto')->orderBy('nombre_producto')->get();
        $herramientas_man = Productos::where('categoria_id', 5)->groupBy('nombre_producto')->orderBy('nombre_producto')->get();
        $herramientas_mec = Productos::where('categoria_id', 6)->groupBy('nombre_producto')->orderBy('nombre_producto')->get();
        $instrumentos_medicion = Productos::select(['id', 'nombre_producto'])->where('categoria_id', '=', 8)->groupBy('nombre_producto')->orderBy('nombre_producto')->get();
        $maquinaria = Productos::where('categoria_id', 11)->groupBy('nombre_producto')->orderBy('nombre_producto')->get();
        $materias = Materias::orderBy('nombre')->get();
        $profesores = User::where('role', '=', 'profesor')->orderBy('last_name')->get();
        $req_ub = Talleres::select(['*'])->orderBy('nombre')->get();

        return Inertia::render('Practicas/Create', [
            'user' => Auth::user(),
            'materias' => $materias,
            'equipo_proteccion' => $equipo_proteccion,
            'instrumentos_medicion' => $instrumentos_medicion,
            'herramientas_man' => $herramientas_man,
            'herramientas_mec' => $herramientas_mec,
            'maquinaria' => $maquinaria,
            'profesores' => $profesores,
            'req_ub' => $req_ub
        ]);
    }

    public function store(PracticasRequest $request)
    {

        $validate = $request->validated();

        if ($validate) {

            if ($request->hasFile('material_apoyo')) {
                $file = $request->file('material_apoyo');
                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/material_apoyo/', $name);
            } else {
                $name = null;
            }

            Practica::create([
                'user_id' => Auth::user()->id,
                'profesores' => ($request->profesores == null) ? null : serialize($request->profesores),
                'materia' => $request->materia,
                'materias_integradoras' => ($request->materias == null) ? null : serialize($request->materias),
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
                'material_apoyo' => $name,
            ]);



            return Redirect::route('panel')->with('success', 'Practica agregada correctamente');
        }
    }

    public function update($practica_id)
    {
        $info = Practica::findOrFail($practica_id);
        $request = Request::validate([
            'profesores' => [],
            'no_pract' => ['required'],
            'materia' => ['required'],
            'materias' => [],
            'unidad' => ['required'],
            'tema' => ['required'],
            'nombre_practica' => ['required'],
            'atributo_egreso' => ['required'],
            'req_ub_op1' => ['required'],
            'req_ub_op2' => [],
            'equipo_prot' => ['required'],
            'maq_usar' => ['required'],
            'inst_med' => [],
            'material_didactico' => ['required'],
            'herr_man' => [],
            'herr_semi' => [],
            'recom_seguridad' => [],
            'objetivo' => ['required'],
            'pasos' => ['required'],
            'fuentes_info' => ['required'],
            'file' => [],
        ]);
        if ($request) {
            $info->update([
                'clave_practica' => $request['no_pract'],
                'profesores' => ($request['profesores'] == null) ? null : serialize($request['profesores']),
                'materia' => $request['materia'],
                'materias_integradoras' => ($request['materias'] == null ? null : serialize($request['materias'])),
                'unidad' => $request['unidad'],
                'tema' => $request['tema'],
                'nombre_practica' => $request['nombre_practica'],
                'atributo_egreso' => $request['atributo_egreso'],
                'req_ub_op1' => $request['req_ub_op1'],
                'req_ub_op2' => $request['req_ub_op2'],
                'equipo_prot' => serialize($request['equipo_prot']),
                'maq_usar' => serialize($request['maq_usar']),
                'inst_med' => serialize($request['inst_med']),
                'material_didactico' => $request['material_didactico'],
                'herr_man' => serialize($request['herr_man']),
                'recom_seguridad' => $request['recom_seguridad'],
                'objetivo' => $request['objetivo'],
                'pasos' => $request['pasos'],
                'status' => 'Aprobado',
                'fuentes_info' => $request['fuentes_info'],
            ]);
            $pdf = app('dompdf.wrapper');
            $pdf->getDomPDF()->set_option("enable_php", true);
            $pdf->setOptions(['isRemoteEnabled' => true, 'isHtml5ParserEnabled' => true]);
            $pdf->loadView('report', compact('info'));
            $pdf->save(public_path() . '/practicas/' . $request['no_pract'] . '.pdf');

            return Redirect::route('panel')->with('success', 'Practica aprobada, se ha generado un pdf disponible en el banco de practicas');
        } else {
            return Redirect::route('panel')->with('error', 'Error al aprobar la practica');
        }
    }

    public function destroy($practica_id)
    {
        $practica = Practica::findOrFail($practica_id);
        $practica->delete();
        return Redirect::route('practicas.index')->with('success', 'Artículo editado correctamente.');

    }

    public function banco()
    {
        if (Auth::user()->role != 'externo') {
            $archivos_aprobados = Practica::where('status', '=', 'Aprobado')
                ->join('users', 'users.id', '=', 'practicas.user_id')
                ->filter(Request::only('q', 'opcion'))
                ->paginate(15);
        } else {
            $archivos_aprobados = Practica::where('status', '=', 'Aprobado')
                ->join('users', 'users.id', '=', 'practicas.user_id')
                ->where('users.id', '=', 'externo')
                ->filter(Request::only('q', 'opcion'))
                ->paginate(15);
        }
        // dd($archivos_aprobados);

        return Inertia::render('Panel/BancoPracticas', ['filters' => Request::all('search', 'opcion'), 'archivos' => $archivos_aprobados]);
    }
}
