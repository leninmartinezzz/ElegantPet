<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('agregar_categoria');
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
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'visualizacion' => 'required|string|max:50',
            'activo' => 'sometimes' // Cambiado de 'estado' a 'activo'
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

            // Crear la categoría
            $categoria = categoria::create([
                'nombre' => $request->input('nombre'),
                'descripcion' => $request->input('descripcion'),
                'imagen' => $imagenUrl,
                'visualizacion' => $request->input('visualizacion'),
                'estado' => $request->has('activo') ? 1 : 0 // ← Esto es clave
            ]);

            return redirect()->route('agregar.categoria')
                ->with('success', 'Categoría registrada exitosamente!');

        } catch (\Exception $e) {
            Log::error('❌ Error al registrar categoría: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Error al registrar la categoría: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, categoria $categoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(categoria $categoria)
    {
        //
    }

       /**
     * ✅ UPLOAD CARE - VERSIÓN FINAL CORREGIDA
     * Usa el dominio real de tu cuenta UploadCare
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

            $fileName = 'categoria_' . time() . '_' . uniqid() . '.jpg';
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
