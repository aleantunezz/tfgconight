@extends('layouts.app')

@section('content')
<main class="register-form">
    @if ($errors->any())
        <div class="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register') }}" method="post">
        @csrf
        <h2>Registrarse</h2>

        <label for="name">Nombre</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>

        <label for="email">Correo Electrónico</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>

        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" required>

        <label for="password_confirmation">Confirmar Contraseña</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>

        <label for="role">Rol</label>
        <select id="role" name="role" required>
            <option value="client">Cliente</option>
            <option value="event_creator">Creador de Eventos</option>
        </select>

        <button type="submit">Registrarse</button>

        <div class="login-link">
            <p>¿Ya tienes una cuenta? <a href="{{ route('login') }}">Inicia Sesión</a></p>
        </div>
    </form>
</main>
@endsection
