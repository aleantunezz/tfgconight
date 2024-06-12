@extends('layouts.app')

@section('content')
<main class="profile-form">
    @if ($errors->any())
        <div class="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('profile') }}" method="post">
        @csrf
        <h2>Editar Perfil</h2>

        <label for="name">Nombre</label>
        <input type="text" id="name" name="name" value="{{ auth()->user()->name }}" required>

        <label for="email">Correo Electrónico</label>
        <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" required>

        <label for="password">Nueva Contraseña (opcional)</label>
        <input type="password" id="password" name="password">

        <label for="password_confirmation">Confirmar Nueva Contraseña</label>
        <input type="password" id="password_confirmation" name="password_confirmation">

        <button type="submit">Guardar Cambios</button>
    </form>
</main>
@endsection
