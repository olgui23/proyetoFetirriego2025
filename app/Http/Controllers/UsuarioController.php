<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
{
    $usuarios = \App\Models\Usuario::all();
    return view('usuarios.usuarios', compact('usuarios'));
}

}
