<?php

namespace App\Http\Controllers;

use App\Models\cita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\mascota;
use App\Models\Servicios;
use Carbon\Carbon;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicios = Servicios::all();
        $mascotas = mascota::where('cliente_id', Auth::id())->get();
        return view('citas.citasusuario', compact('servicios', 'mascotas'));
    }

    public function consultaCitas(Request $request)
    {
        // Obtener servicios para los filtros
        $servicios = Servicios::all();
        
        // Construir query base
        $query = cita::with(['cliente', 'mascota', 'servicio'])
                    ->orderBy('fecha_hora', 'desc');

        // Aplicar filtros
        if ($request->has('fecha') && $request->fecha) {
            $fecha = Carbon::createFromFormat('d/m/Y', $request->fecha);
            $query->whereDate('fecha_hora', $fecha);
        }

        if ($request->has('servicio_id') && $request->servicio_id) {
            $query->where('servicio_id', $request->servicio_id);
        }

        // Obtener citas paginadas
        $citas = $query->paginate(10);

        // Estadísticas
        $totalCitas = cita::count();
        $citasHoy = cita::whereDate('fecha_hora', Carbon::today())->count();
        $citasPendientes = cita::where('fecha_hora', '>', Carbon::now())->count();
        $citasProximaSemana = cita::whereBetween('fecha_hora', [
            Carbon::now(),
            Carbon::now()->addWeek()
        ])->count();

        return view('citas.consultacitas', compact(
            'citas', 
            'servicios', 
            'totalCitas', 
            'citasHoy', 
            'citasPendientes', 
            'citasProximaSemana'
        ));
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
        try {
            $request->validate([
                'servicio_id' => 'required|exists:servicios,id',
                'mascota_id' => 'required|exists:mascotas,id',
                'fecha' => 'required|date_format:d/m/Y',
                'hora' => 'required|string',
                'nota_mascota' => 'nullable|string|max:500'
            ]);

            // Verificar que la mascota pertenezca al usuario autenticado
            $mascota = mascota::where('id', $request->mascota_id)
                            ->where('cliente_id', Auth::id())
                            ->first();

            if (!$mascota) {
                return response()->json([
                    'success' => false,
                    'message' => 'La mascota seleccionada no existe o no te pertenece.'
                ], 422);
            }

            // Combinar fecha y hora (formato d/m/Y H:i)
            $fechaHora = Carbon::createFromFormat('d/m/Y H:i', $request->fecha . ' ' . $request->hora);

            // Verificar que la fecha no sea en el pasado
            if ($fechaHora->isPast()) {
                return response()->json([
                    'success' => false,
                    'message' => 'No puedes agendar citas en fechas pasadas.'
                ], 422);
            }

            // VERIFICACIÓN 1: Cita existente para la misma mascota en la misma fecha y hora
            $citaExistenteMascota = cita::where('fecha_hora', $fechaHora)
                                ->where('mascota_id', $request->mascota_id)
                                ->exists();

            if ($citaExistenteMascota) {
                return response()->json([
                    'success' => false,
                    'message' => 'Ya tienes una cita programada para esta mascota en la misma fecha y hora.'
                ], 422);
            }

            // VERIFICACIÓN 2: Cita existente para el mismo cliente en la misma fecha y hora
            $citaExistenteCliente = cita::where('fecha_hora', $fechaHora)
                                ->where('cliente_id', Auth::id())
                                ->exists();

            if ($citaExistenteCliente) {
                return response()->json([
                    'success' => false,
                    'message' => 'Ya tienes una cita programada para otra mascota en la misma fecha y hora.'
                ], 422);
            }

            // VERIFICACIÓN 3: Cita existente para el mismo servicio en la misma fecha y hora
            // (esto evita que dos clientes agenden el mismo servicio a la misma hora)
            $citaExistenteServicio = cita::where('fecha_hora', $fechaHora)
                                ->where('servicio_id', $request->servicio_id)
                                ->exists();

            if ($citaExistenteServicio) {
                return response()->json([
                    'success' => false,
                    'message' => 'Lo sentimos, ya hay una cita agendada para este servicio en la fecha y hora seleccionada. Por favor, elige otro horario.'
                ], 422);
            }

            // VERIFICACIÓN 4: Cita existente en un rango de tiempo (por ejemplo, 30 minutos antes o después)
            $fechaHoraInicio = $fechaHora->copy()->subMinutes(30);
            $fechaHoraFin = $fechaHora->copy()->addMinutes(30);

            $citaEnRango = cita::whereBetween('fecha_hora', [$fechaHoraInicio, $fechaHoraFin])
                            ->where(function($query) use ($request) {
                                $query->where('cliente_id', Auth::id())
                                      ->orWhere('servicio_id', $request->servicio_id);
                            })
                            ->exists();

            if ($citaEnRango) {
                return response()->json([
                    'success' => false,
                    'message' => 'Ya existe una cita programada muy cerca de este horario. Por favor, elige un horario con al menos 30 minutos de diferencia.'
                ], 422);
            }

            // Crear la cita
            $cita = cita::create([
                'servicio_id' => $request->servicio_id,
                'cliente_id' => Auth::id(),
                'mascota_id' => $request->mascota_id,
                'fecha_hora' => $fechaHora,
                'nota_mascota' => $request->nota_mascota
            ]);

            return response()->json([
                'success' => true,
                'message' => '¡Cita agendada exitosamente!',
                'cita_id' => $cita->id,
                'fecha' => $fechaHora->format('d/m/Y H:i')
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error de validación',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            \Log::error('Error al crear cita: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error al agendar la cita: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(cita $cita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cita $cita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cita $cita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cita $cita)
    {
        //
    }
}