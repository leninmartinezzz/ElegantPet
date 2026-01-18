<?php

namespace App\Http\Controllers;

use App\Models\articulos;
use App\Models\categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ArticulosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = categoria::all();
        return view('agregar_producto', compact('categorias'));
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
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'activo' => 'sometimes',
            'existencia' => 'required|integer|min:0',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        try {
            $imagenUrl = null;
            
            // ✅ SUBIR A UPLOAD CARE
            if ($request->hasFile('imagen')) {
                Log::info('🚀 Iniciando subida a UploadCare...');
                $imagenUrl = $this->uploadToUploadCare($request->file('imagen'));
                
                if (!$imagenUrl) {
                    return redirect()->back()
                        ->with('error', 'No se pudo subir la imagen. Por favor, intenta con otra imagen.')
                        ->withInput();
                }
                
                Log::info('🎉 Imagen subida correctamente: ' . $imagenUrl);
            }

            // ✅ CORREGIDO: Crear el ARTÍCULO (no categoría)
            $articulo = articulos::create([
                'nombre' => $request->input('nombre'),
                'descripcion' => $request->input('descripcion'),
                'precio' => $request->input('precio'),
                'imagen' => $imagenUrl,
                'activo' => $request->has('activo') ? 1 : 0,
                'existencia' => $request->input('existencia'),
                'categoria_id' => $request->input('categoria_id'),
            ]);

            // ✅ CORREGIDO: Mensaje y ruta apropiados para artículos
            return redirect()->route('agregar.producto') // Cambia por tu ruta real
                ->with('success', 'Artículo registrado exitosamente!');

        } catch (\Exception $e) {
            // ✅ CORREGIDO: Mensaje de error apropiado
            Log::error('❌ Error al registrar artículo: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Error al registrar el artículo: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(articulos $articulos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(articulos $articulos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, articulos $articulos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(articulos $articulos)
    {
        //
    }

    /**
     * ✅ UPLOAD CARE - VERSIÓN MEJORADA
     */
    private function uploadToUploadCare($imageFile)
    {
        try {
            if (!$imageFile || !$imageFile->isValid()) {
                Log::error('❌ Archivo de imagen no válido');
                return null;
            }

            // ✅ OBTENER CREDENCIALES DESDE .env
            $publicKey = env('UPLOADCARE_PUBLIC_KEY', '700f6191d60e0f453429');
            $secretKey = env('UPLOADCARE_SECRET_KEY');
            $uploadCareDomain = env('UPLOADCARE_DOMAIN', '48f9oq2jzg.ucarecd.net');

            if (!$secretKey) {
                Log::error('❌ Secret Key no configurada en .env');
                return null;
            }

            // ✅ CORREGIDO: Cambiar nombre para artículos
            $fileName = 'articulo_' . time() . '_' . uniqid() . '.' . $imageFile->getClientOriginalExtension();
            $timestamp = time();
            
            // ✅ GENERAR SIGNATURE
            $dataToSign = $secretKey . $timestamp;
            $signature = hash_hmac('sha256', $dataToSign, $secretKey);

            Log::info("📤 Subiendo a UploadCare...");
            Log::info("   - Archivo: {$fileName}");
            Log::info("   - Dominio: {$uploadCareDomain}");

            // ✅ SUBIR ARCHIVO
            $response = Http::timeout(30)
                ->asMultipart()
                ->post('https://upload.uploadcare.com/base/', [
                    [
                        'name' => 'UPLOADCARE_PUB_KEY',
                        'contents' => $publicKey
                    ],
                    [
                        'name' => 'signature', 
                        'contents' => $signature
                    ],
                    [
                        'name' => 'expire',
                        'contents' => $timestamp + 300
                    ],
                    [
                        'name' => 'file',
                        'contents' => fopen($imageFile->getRealPath(), 'r'),
                        'filename' => $fileName
                    ]
                ]);

            $statusCode = $response->status();
            Log::info("📡 Respuesta UploadCare - Status: {$statusCode}");

            if ($response->successful()) {
                $data = $response->json();
                
                if (isset($data['file'])) {
                    $fileId = $data['file'];
                    
                    // ✅ USAR EL DOMINIO REAL DE TU CUENTA
                    $imageUrl = "https://{$uploadCareDomain}/{$fileId}/{$fileName}";
                    
                    Log::info("✅ URL GENERADA: {$imageUrl}");
                    
                    // ✅ VERIFICAR QUE LA IMAGEN SE PUEDE LEER
                    if ($this->testImageUrl($imageUrl)) {
                        Log::info("🎉 VERIFICACIÓN: La imagen se carga correctamente");
                    } else {
                        Log::warning("⚠️ VERIFICACIÓN: La imagen no se pudo verificar, pero se guardará");
                    }
                    
                    return $imageUrl;
                } else {
                    Log::error('❌ Respuesta sin file ID: ' . json_encode($data));
                    return null;
                }
            } else {
                Log::error("❌ Error en subida - Status: {$statusCode}, Body: " . $response->body());
                return null;
            }
            
        } catch (\Exception $e) {
            Log::error('❌ Excepción en UploadCare: ' . $e->getMessage());
            return null;
        }
    }

    private function testImageUrl($url)
    {
        try {
            $response = Http::timeout(5)->get($url);
            return $response->successful();
        } catch (\Exception $e) {
            return false;
        }
    }
}