<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoria;
use App\Models\articulos;
use App\Models\mascota;
use App\Models\cita;

class index extends Controller
{
    public function index()
    {
        // Obtener categorías con visualización = 1 y sus productos
        $categorias = categoria::withCount(['articulos' => function($query) {
            $query->where('activo', 1);
        }])->where('visualizacion', 1)->get();

        // Obtener productos activos con sus categorías
        $productos = articulos::with('categoria')
            ->where('activo', 1)
            ->orderBy('created_at', 'desc')
            ->take(8) // Limitar a 8 productos para el dashboard
            ->get();

         $mascotas_usuario = mascota::where('cliente_id', auth()->id())->count();   

         $citas_usuario = cita::where('cliente_id', auth()->id())->count();

        return view('index', compact('categorias', 'productos', 'mascotas_usuario', 'citas_usuario'));
    }
}
