<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Mostrar formulario de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Procesar login (ahora acepta email o username)
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => 'required|string', // Campo único para username o email
            'password' => 'required|string|min:4',
        ], [
            'login.required' => 'El nombre de usuario o email es obligatorio',
            'password.required' => 'La contraseña es obligatoria',
            'password.min' => 'La contraseña debe tener al menos 4 caracteres'
        ]);

        // Determinar si el login es email o username
        $field = filter_var($credentials['login'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        
        // Intentar autenticación
        if (Auth::attempt([$field => $credentials['login'], 'password' => $credentials['password']], $request->remember)) {
            $request->session()->regenerate();
            
            return redirect()->intended('dashboard')
                ->with('success', '¡Bienvenido de nuevo, '.Auth::user()->nombre.'!');
        }

        return back()->withErrors([
            'login' => 'Las credenciales no coinciden con nuestros registros.',
        ])->onlyInput('login');
    }

    // Mostrar formulario de registro
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Procesar registro (optimizado)
    public function register(Request $request)
    {
        $validatedData = $this->validateRegistration($request);

        $user = $this->createUser($validatedData, $request);

        Auth::login($user);

        return redirect()->route('dashboard')
            ->with('success', '¡Registro exitoso! Bienvenido/a ' . $user->nombre);
    }

    // Cerrar sesión
    public function logout(Request $request)
    {
        $name = Auth::user()->nombre ?? 'Usuario';
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login')
            ->with('status', "¡Hasta pronto, $name! Has cerrado sesión correctamente");
    }

    /**
     * Validar datos de registro
     */
    protected function validateRegistration(Request $request): array
    {
        return $request->validate([
            'nombre' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'username' => 'required|string|min:3|max:30|unique:users|regex:/^[a-zA-Z0-9_]+$/',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|string|min:4|confirmed',
            'fecha_nacimiento' => 'nullable|date|before:-18 years',
            'genero' => 'nullable|in:masculino,femenino,otro',
            'foto_perfil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048|dimensions:max_width=2000,max_height=2000',
        ], $this->validationMessages());
    }

    /**
     * Mensajes de validación personalizados
     */
    protected function validationMessages(): array
    {
        return [
            'nombre.required' => 'El nombre es obligatorio',
            'apellidos.required' => 'Los apellidos son obligatorios',
            'username.required' => 'El nombre de usuario es obligatorio',
            'username.unique' => 'Este nombre de usuario ya está registrado',
            'username.regex' => 'Solo se permiten letras, números y guiones bajos',
            'email.required' => 'El email es obligatorio',
            'email.unique' => 'Este email ya está registrado',
            'password.min' => 'La contraseña debe tener al menos 4 caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'fecha_nacimiento.before' => 'Debes ser mayor de 18 años',
            'foto_perfil.image' => 'El archivo debe ser una imagen válida',
            'foto_perfil.max' => 'La imagen no debe superar los 2MB',
            'foto_perfil.dimensions' => 'La imagen es demasiado grande (máx. 2000x2000px)'
        ];
    }

    /**
     * Crear nuevo usuario
     */
    protected function createUser(array $data, Request $request): User
    {
        $userData = [
            'nombre' => $data['nombre'],
            'apellidos' => $data['apellidos'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => $data['password'], // El modelo se encarga del hashing
            'fecha_nacimiento' => $data['fecha_nacimiento'],
            'genero' => $data['genero'],
        ];

        if ($request->hasFile('foto_perfil')) {
            $userData['foto_perfil'] = $request->file('foto_perfil')->store('profile_photos', 'public');
        }

        return User::create($userData);
    }
}