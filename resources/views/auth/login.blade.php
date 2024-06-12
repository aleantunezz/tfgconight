@extends('layouts.app')

@section('content')
<main class="login-form">
    <form action="{{ route('login') }}" method="post">
        @csrf
        <h2>Iniciar Sesión</h2>
        <label for="email">Correo Electrónico</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Ingresar</button>
        <div class="register-link">
            <p>¿No tienes una cuenta? <a href="{{ route('register') }}">Regístrate</a></p>
        </div>
    </form>
</main>
@endsection
