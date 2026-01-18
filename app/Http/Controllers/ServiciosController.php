<?php

namespace App\Http\Controllers;

use App\Models\Servicios;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('agregar_servicio');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'cantidad_cupo_maxima' => 'required|integer',
        ]);

        // Crear un nuevo servicio en la base de datos
        Servicios::create($validatedData);

        // Redirigir con un mensaje de éxito
        return redirect()->route('agregar.servicio')->with('success', 'Servicio agregado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Servicios $servicios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servicios $servicios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Servicios $servicios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servicios $servicios)
    {
        //
    }
}
