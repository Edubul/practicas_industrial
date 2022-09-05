<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use App\Models\Productos;
use App\Models\Prestamos;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class PrestamosController extends Controller
{
    public function index()
    {
        $articulo = (Request::exists('q') != '' ? Productos::where('productos.nomenclatura','=', Request::only('q'))->get() : '');
        
        $articulos_prestamos = Prestamos::select(['productos.nombre_producto','productos.nomenclatura','prestamos.aula','users.name','users.last_name','p.name as pNombre','p.last_name as pApellidos','prestamos.status','prestamos.hora_pedido'])
            ->join('productos','prestamos.producto_id','=','productos.id')
            ->join('users','prestamos.encargado_id','=','users.id')
            ->join('users as p', 'prestamos.profesor_id', '=', 'p.num_control')
            ->paginate(20);
        return Inertia::render('Prestamos/Index', ['articulo' => $articulo, 'prestamos' => $articulos_prestamos]);
    }

    public function store()
    {
        $validate = Request::validate([
            'nomenclatura' => ['required'],
            'profesor_id' => ['required'],
            'aula' => ['required'],
        ]);
        if($validate){
            $id_producto = Productos::select(['id'])->where('productos.nomenclatura','=', Request::only('nomenclatura'))->first();
            Prestamos::create([
                'producto_id' => $id_producto['id'],
                'encargado_id' => Auth::user()->id,
                'profesor_id' => $validate['profesor_id'],
                'hora_pedido' => Carbon::now(),
                'hora_entrega' => '',
                'aula' => $validate['aula'],
            ]);

            return Redirect::route('prestamos.index')->with('success', 'Prestamo agregado correctamente.');
        }
        
    }        
}
