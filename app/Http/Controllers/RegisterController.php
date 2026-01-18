<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Show the registration form.
     */
    public function showRegistrationForm()
    {
        return view('register'); // Asegúrate de que esta vista existe
    }

    /**
     * Handle a registration request.
     */
    public function register(Request $request)
    {
        // Validar si es una petición AJAX
        if ($request->ajax() || $request->wantsJson()) {
            return $this->handleAjaxRegistration($request);
        }

        return $this->handleFormRegistration($request);
    }

    /**
     * Handle AJAX registration requests.
     */
    private function handleAjaxRegistration(Request $request)
    {
        try {
            $validator = Validator::make(
                $request->all(), 
                User::getValidationRules(),
                User::getValidationMessages()
            );

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error de validación',
                    'errors' => $validator->errors()
                ], 422);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'rol' => User::ROL_ADMIN, // Asignar rol de administrador
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Usuario registrado exitosamente. Serás redirigido al login.',
                'redirect_url' => route('login') // Agregar URL de redirección
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error interno del servidor',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Handle traditional form registration requests.
     */
    private function handleFormRegistration(Request $request)
    {
        $validator = Validator::make(
            $request->all(), 
            User::getValidationRules(),
            User::getValidationMessages()
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => User::ROL_ADMIN, // Asignar rol de administrador
        ]);

        return redirect()->route('login')
            ->with('success', 'Usuario registrado exitosamente. Ahora puedes iniciar sesión.');
    }

    /**
     * Check if email is available (validación en tiempo real)
     */
    public function checkEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return response()->json(['available' => false]);
        }

        $exists = User::where('email', $request->email)->exists();

        return response()->json(['available' => !$exists]);
    }
}