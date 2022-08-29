<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use App\Models\Productos;
use Illuminate\Support\Facades\DB;
use App\Models\CategoriaProductos;
use Illuminate\Support\Facades\Redirect;


class InventarioController extends Controller
{
    public function index()
    {
        $productos = Productos::select(['productos.id','nombre_producto','descripcion','categoria_productos.nombre_categoria as categoria','nomenclatura','cantidad'])
            ->join('categoria_productos','categoria_productos.id','=','productos.categoria_id')
            ->orderBy('nombre_producto')
            ->paginate(30);

        $totalProductos = Productos::select(['nombre_producto','descripcion','categoria_productos.nombre_categoria as categoria','nomenclatura','cantidad'])
            ->join('categoria_productos','categoria_productos.id','=','productos.categoria_id')
            ->orderBy('nombre_producto')
            ->count();
            
        return Inertia::render('Inventario/Index', ['productos' => $productos, 'total_productos' => $totalProductos]);
    }

    public function create() {
        return Inertia::render('Inventario/Create');
    }

    public function edit($art_id)
    {
        $articulo = Productos::findorfail($art_id);
        $categorias = CategoriaProductos::select('id','nombre_categoria')->get();
        return Inertia::render('Inventario/Edit', ['articulo' => $articulo, 'categorias' => $categorias]);
    }

    public function update($art_id){
        $articulo = Productos::findOrFail($art_id);
        $request = Request::validate([
            'nombre' => ['required'],
            'categoria' => ['required'],
            'descripcion' => ['required'],
            'referencia_int' => [],
            'nomenclatura' => ['required'],
        ]);
        

        if($request){
            $articulo->update([
                'nombre_producto' => $request['nombre'],
                'descripcion' => $request['descripcion'],
                'categoria_id' => $request['categoria'],
                'ref_interna' => $request['referencia_int'],
                'nomenclatura' => $request['nomenclatura'],
            ]);
            
            return Redirect::route('panel')->with('success', 'Artículo editado correctamente.');
        } else{
            return Redirect::route('panel')->with('error', 'Error al editar el articulo');
        }
    }
}
