@extends('layouts.app')

@section('content')
<main class="profile-form">
    <form action="{{ route('events.store') }}" method="post">
        @csrf
        <h2>Crear Evento</h2>
        <label for="name">Nombre del Evento</label>
        <input type="text" id="name" name="name" required>
        <label for="description">Descripción</label>
        <textarea id="description" name="description" required></textarea>
        <label for="date">Fecha</label>
        <input type="datetime-local" id="date" name="date" required>
        <label for="available_tickets">Entradas Disponibles</label>
        <input type="number" id="available_tickets" name="available_tickets" required>
        <label for="price">Precio</label>
        <input type="number" id="price" name="price" step="0.01" required>
        <button type="submit">Crear Evento</button>
    </form>
</main>
@endsection
