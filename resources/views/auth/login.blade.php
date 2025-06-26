@extends('layout')

@section('title', 'Iniciar Sesión')

@section('contenido')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0 text-center">Iniciar Sesión</h5>
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-info">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <p class="mb-1">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="login" class="form-label">Usuario o Email</label>
                            <input type="text" class="form-control @error('login') is-invalid @enderror" 
                                   id="login" name="login" value="{{ old('login') }}" 
                                   required autofocus>
                            @error('login')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                   id="password" name="password" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Recordar sesión</label>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-sign-in-alt me-2"></i> Ingresar
                            </button>
                        </div>
                    </form>

                    <div class="text-center mt-4">
                        <p class="mb-2">¿No tienes cuenta?</p>
                        <a href="{{ route('register') }}" class="btn btn-outline-success">
                            <i class="fas fa-user-plus me-2"></i> Regístrate aquí
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection