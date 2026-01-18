<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use App\Models\articulos;
use Illuminate\Http\Request;

class Dashboard extends Controller
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

        return view('dashboard', compact('categorias', 'productos'));
    }
}