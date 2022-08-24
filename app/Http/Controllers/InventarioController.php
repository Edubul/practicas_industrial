<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Productos;


class InventarioController extends Controller
{
    public function index()
    {
        $productos = Productos::select(['nombre_producto','descripcion','categoria_productos.nombre_categoria as categoria','nomenclatura','cantidad'])
            ->join('categoria_productos','categoria_productos.id','=','productos.categoria_id')
            ->orderBy('nombre_producto')
            ->paginate(30);

        $totalProductos = Productos::select(['nombre_producto','descripcion','categoria_productos.nombre_categoria as categoria','nomenclatura','cantidad'])
            ->join('categoria_productos','categoria_productos.id','=','productos.categoria_id')
            ->orderBy('nombre_producto')
            ->count();
            
        return Inertia::render('Inventario/Index', ['productos' => $productos, 'total_productos' => $totalProductos]);
    }
}
