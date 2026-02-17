<?php

namespace App\Http\Controllers;

use App\Models\mascota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('agregar_mascota');
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

            if (!Auth::check()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Usuario no autenticado'
                ], 401);
            }

            else{


        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'especie' => 'required|string|max:100',
            'raza' => 'nullable|string|max:100',
            'edad' => 'nullable|integer|min:0',
        ]);

        $validatedData['cliente_id'] = Auth::id();

        $mascota = mascota::create($validatedData);

        return redirect()->route('agregar.mascota')->with('success', 'Mascota agregada exitosamente.');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(mascota $mascota)
    {
        $mascota = mascota::all()->where('cliente_id', Auth::id());
        $mascota_cantidad = $mascota->count();
        return view('dashboard', compact('mascota', 'mascota_cantidad'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(mascota $mascota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, mascota $mascota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(mascota $mascota)
    {
        //
    }
}
