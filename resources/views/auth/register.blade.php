@extends('layout')

@section('title', 'Registro de Agricultor')

@section('contenido')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0 text-center">Registro de Agricultor de Lechuga</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <h5 class="text-success mb-4">Información Personal</h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="apellidos" class="form-label">Apellidos</label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ old('apellidos') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="tel" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }}" required>
                            </div>
                            <div class="col-12">
                                <label for="direccion" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion') }}" required>
                            </div>
                        </div>

                        <h5 class="text-success mb-4">Información de Cuenta</h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="tipo_agricultor" class="form-label">Tipo de Agricultor</label>
                                <select class="form-select" id="tipo_agricultor" name="tipo_agricultor" required>
                                    <option value="">Seleccione...</option>
                                    <option value="pequeño" {{ old('tipo_agricultor') == 'pequeño' ? 'selected' : '' }}>Pequeño (menos de 2 hectáreas)</option>
                                    <option value="mediano" {{ old('tipo_agricultor') == 'mediano' ? 'selected' : '' }}>Mediano (2-10 hectáreas)</option>
                                    <option value="grande" {{ old('tipo_agricultor') == 'grande' ? 'selected' : '' }}>Grande (más de 10 hectáreas)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="col-md-6">
                                <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                            </div>
                        </div>

                        <h5 class="text-success mb-4">Información Agrícola</h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="tipo_cultivo" class="form-label">Tipo de Lechuga</label>
                                <select class="form-select" id="tipo_cultivo" name="tipo_cultivo" required>
                                    <option value="">Seleccione...</option>
                                    <option value="Romana" {{ old('tipo_cultivo') == 'Romana' ? 'selected' : '' }}>Romana</option>
                                    <option value="Iceberg" {{ old('tipo_cultivo') == 'Iceberg' ? 'selected' : '' }}>Iceberg</option>
                                    <option value="Butterhead" {{ old('tipo_cultivo') == 'Butterhead' ? 'selected' : '' }}>Butterhead</option>
                                    <option value="Lollo" {{ old('tipo_cultivo') == 'Lollo' ? 'selected' : '' }}>Lollo</option>
                                    <option value="Hoja de Roble" {{ old('tipo_cultivo') == 'Hoja de Roble' ? 'selected' : '' }}>Hoja de Roble</option>
                                    <option value="Otro" {{ old('tipo_cultivo') == 'Otro' ? 'selected' : '' }}>Otro</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="terreno_hectareas" class="form-label">Terreno (hectáreas)</label>
                                <input type="number" step="0.01" class="form-control" id="terreno_hectareas" name="terreno_hectareas" value="{{ old('terreno_hectareas') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="metodo_cultivo" class="form-label">Método de Cultivo</label>
                                <select class="form-select" id="metodo_cultivo" name="metodo_cultivo" required>
                                    <option value="">Seleccione...</option>
                                    <option value="Campo abierto" {{ old('metodo_cultivo') == 'Campo abierto' ? 'selected' : '' }}>Campo abierto</option>
                                    <option value="Invernadero" {{ old('metodo_cultivo') == 'Invernadero' ? 'selected' : '' }}>Invernadero</option>
                                    <option value="Hidroponía" {{ old('metodo_cultivo') == 'Hidroponía' ? 'selected' : '' }}>Hidroponía</option>
                                    <option value="Mixto" {{ old('metodo_cultivo') == 'Mixto' ? 'selected' : '' }}>Mixto</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="experiencia_agricola" class="form-label">Experiencia Agrícola (años)</label>
                                <input type="number" class="form-control" id="experiencia_agricola" name="experiencia_agricola" value="{{ old('experiencia_agricola') }}">
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success btn-lg py-3">
                                <i class="fas fa-user-plus me-2"></i> Registrarse como Agricultor
                            </button>
                        </div>

                        <div class="text-center mt-4">
                            <p class="mb-0">¿Ya tienes cuenta? <a href="{{ route('login') }}" class="text-success fw-bold">Inicia sesión aquí</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection