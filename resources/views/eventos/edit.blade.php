@extends('layouts.app')

@section('content')
<main class="profile-form">
    <h2>Editar Evento</h2>
    <form action="{{ route('events.update', ['event' => $event->id]) }}" method="post">
        @csrf
        @method('PUT')
        <label for="name">Nombre del Evento</label>
        <input type="text" id="name" name="name" value="{{ $event->name }}" required>
        <label for="description">Descripción</label>
        <textarea id="description" name="description" required>{{ $event->description }}</textarea>
        <label for="date">Fecha</label>
        <input type="datetime-local" id="date" name="date" value="{{ $event->date->format('Y-m-d\TH:i') }}" required>
        <label for="available_tickets">Entradas Disponibles</label>
        <input type="number" id="available_tickets" name="available_tickets" value="{{ $event->available_tickets }}" required>
        <label for="price">Precio</label>
        <input type="number" id="price" name="price" value="{{ $event->price }}" step="0.01" required>
        <button type="submit">Actualizar Evento</button>
    </form>

    <form action="{{ route('events.destroy', ['event' => $event->id]) }}" method="post" style="margin-top: 20px;">
        @csrf
        @method('DELETE')
        <button type="submit" class="delete-button">Eliminar Evento</button>
    </form>
</main>
@endsection
