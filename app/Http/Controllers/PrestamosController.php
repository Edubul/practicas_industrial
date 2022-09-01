<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use App\Models\Productos;
use App\Models\Prestamos;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class PrestamosController extends Controller
{
    public function index()
    {
        $articulo = (Request::only('q') != '' ? Productos::where('productos.nomenclatura','=',Request::only('q'))->get() : '');
        $articulos_prestamos = Prestamos::join('productos','productos.id','=','prestamos.producto_id')
            ->join('users','users.id','=','prestamos.profesor_id')
            ->join('users','users.id','=','prestamos.encargado_id')
            ->get();
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
            Prestamos::create([
                'encargado_id' => Auth::user()->id,
                'profesor_id' => $validate['profesor_id'],
                'hora_pedido' => Carbon::now(),
                'hora_entrega' => '',
                'aula' => $validate['aula'],
            ]);
        }
        
    }        
}
