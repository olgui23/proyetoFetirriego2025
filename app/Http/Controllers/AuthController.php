<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    
    public function __construct()
{
    $this->middleware('guest')->except('logout');
}
    /**
     * Mostrar formulario de login
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Procesar el login
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    /**
     * Mostrar formulario de registro
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Procesar el registro
     */
    public function register(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'apellidos' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'fecha_nacimiento' => 'required|date',
        'direccion' => 'required|string|max:255',
        'telefono' => 'required|string|max:20',
        'tipo_agricultor' => 'required|in:pequeño,mediano,grande',
        'tipo_cultivo' => 'required|string|max:100',
        'terreno_hectareas' => 'required|numeric|min:0',
        'metodo_cultivo' => 'required|string|max:100',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    $user = User::create([
        'name' => $request->name,
        'apellidos' => $request->apellidos,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'fecha_nacimiento' => $request->fecha_nacimiento,
        'direccion' => $request->direccion,
        'telefono' => $request->telefono,
        'tipo_agricultor' => $request->tipo_agricultor,
        'experiencia_agricola' => $request->experiencia_agricola,
        'tipo_cultivo' => $request->tipo_cultivo,
        'terreno_hectareas' => $request->terreno_hectareas,
        'metodo_cultivo' => $request->metodo_cultivo,
    ]);

    Auth::login($user);

    return redirect()->route('dashboard')->with('success', '¡Registro exitoso! Bienvenido al sistema de fertirriego.');
}

    /**
     * Cerrar sesión
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}